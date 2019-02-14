<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 13/02/2019
 * Time: 10:06 AM
 */
?>
<h2>Guitar Wars - High Scores Administration</h2>
<p>Below is a list of all Guitar Wars high scores. Use this page to remove scores as needed.</p>
<hr />
<?php
  require_once('appvars.php');
  include ('dbconnect.php');
  // Retrieve the score data from MySQL
  $query = "SELECT * FROM guitarwars ORDER BY score DESC, date ASC";
  $data = mysqli_query($dbc, $query);
  // Loop through the array of score data, formatting it as HTML
  echo '<table>';
  echo '<tr><th>Name</th><th>Date</th><th>Score</th><th>Action</th></tr>';
  while ($row = mysqli_fetch_array($data)) {
    // Display the score data
    echo '<tr class="scorerow"><td><strong>' . $row['name'] . '</strong></td>';
    echo '<td>' . $row['date'] . '</td>';
    echo '<td>' . $row['score'] . '</td>';
    echo '<td><a class="btn btn-danger mb-3" href="index.php?c=guitarwars&a=removescore&id=' . $row['id'] . '&amp;date=' . $row['date'] .
      '&amp;name=' . $row['name'] . '&amp;score=' . $row['score'] .
      '&amp;screenshot=' . $row['screenshot'] . '">Remove</a>';
    if ($row['approved'] == '0') {
      echo ' / <a class="btn btn-primary mb-3" href="index.php?c=guitarwars&a=approvescore&id=' . $row['id'] . '&amp;date=' . $row['date'] .
        '&amp;name=' . $row['name'] . '&amp;score=' . $row['score'] . '&amp;screenshot=' .
        $row['screenshot'] . '">Approve</a>';
    }
    echo '</td></tr>';
  }
  echo '</table>';

  mysqli_close($dbc);
?>
<a class="btn btn-danger" href="index.php?c=guitarwars&a=index">Back to guitar wars score</a>
