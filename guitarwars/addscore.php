<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 13/02/2019
 * Time: 9:49 AM
 */
?>
<h2>Guitar Wars - Add Your High Score</h2>
<?php
  require_once ('appvars.php');
  include ('dbconnect.php');

  if (isset($_POST['submit'])) {
    // Grab the score data from the POST
    $name = mysqli_real_escape_string($dbc, trim($_POST['name']));
    $score = mysqli_real_escape_string($dbc, trim($_POST['score']));
    $screenshot = mysqli_real_escape_string($dbc, trim($_FILES['screenshot']['name']));
    $screenshot_type = $_FILES['screenshot']['type'];
    $screenshot_size = $_FILES['screenshot']['size'];
    if (!empty($name) && is_numeric($score) && !empty($screenshot)) {
      if ((($screenshot_type == 'image/gif') || ($screenshot_type == 'image/jpeg') || ($screenshot_type == 'image/pjpeg') || ($screenshot_type == 'image/png'))
        && ($screenshot_size > 0) && ($screenshot_size <= GW_MAXFILESIZE)) {
        if ($_FILES['screenshot']['error'] == 0) {
          // Move the file to the target upload folder
          $target = GW_UPLOADPATH . $screenshot;
          if (move_uploaded_file($_FILES['screenshot']['tmp_name'], $target)) {
            // Write the data to the database
            $query = "INSERT INTO guitarwars (date, name, score, screenshot) VALUES (NOW(), '$name', '$score', '$screenshot')";
            mysqli_query($dbc, $query);

            // Confirm success with the user
            echo '<p>Thanks for adding your new high score! It will be reviewed and added to the high score list as soon as possible.</p>';
            echo '<p><strong>Name:</strong> ' . $name . '<br />';
            echo '<strong>Score:</strong> ' . $score . '<br />';
            echo '<img src="' . GW_UPLOADPATH . $screenshot . '" alt="Score image" /></p>';
            echo '<p><a href="index.php?c=guitarwars&a=index">&lt;&lt; Back to high scores</a></p>';

            // Clear the score data to clear the form
            $name = "";
            $score = "";
            $screenshot = "";

            mysqli_close($dbc);
          }
          else {
            echo '<p class="error">Sorry, there was a problem uploading your screen shot image.</p>';
          }
        }
      }
      else {
        echo '<p class="error">The screen shot must be a GIF, JPEG, or PNG image file no greater than ' . (GW_MAXFILESIZE / 1024) . ' KB in size.</p>';
      }

      // Try to delete the temporary screen shot image file
      @unlink($_FILES['screenshot']['tmp_name']);
    }
    else {
      echo '<p class="error">Please enter all of the information to add your high score.</p>';
    }
  }

?>
<hr />
<form enctype="multipart/form-data" method="post" action="index.php?c=guitarwars&a=addscore">
  <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo GW_MAXFILESIZE; ?>" />
  <label for="name">Name:</label>
  <input type="text" id="name" name="name" value="<?php if (!empty($name)) echo $name; ?>" /><br />
  <label for="score">Score:</label>
  <input type="text" id="score" name="score" value="<?php if (!empty($score)) echo $score; ?>" /><br />
  <label for="screenshot">Screen shot:</label>
  <input type="file" id="screenshot" name="screenshot" />
  <hr />
  <input class="btn btn-success" type="submit" value="Add" name="submit" />
</form>