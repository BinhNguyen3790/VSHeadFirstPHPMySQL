<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 12/02/2019
 * Time: 4:39 PM
 */
  include ("dbconnect.php");
?>
<img src="../images/blankface.jpg" width="161" height="350" alt="" style="float:right" />
<img name="elvislogo" src="../images/elvislogo.gif" width="229" height="32" border="0" alt="Make Me Elvis" />
<p>Please select the email addresses to delete from the email list and click Remove.</p>
<form method="post" action="index.php?c=makemeelvis&a=removeemail">

  <?php
  // Delete the customer rows (only if the form has been submitted)
  if (isset($_POST['submit'])) {
    foreach ($_POST['todelete'] as $delete_id) {
      $query = "DELETE FROM email_list WHERE id = $delete_id";
      mysqli_query($dbc, $query)
      or die('Error querying database.');
    }

    echo 'Customer(s) removed.<br />';
  }

  // Display the customer rows with checkboxes for deleting
  $query = "SELECT * FROM email_list";
  $result = mysqli_query($dbc, $query);
  while ($row = mysqli_fetch_array($result)) {
    echo '<input type="checkbox" value="' . $row['id'] . '" name="todelete[]" />';
    echo ' ' . $row['email'];
    echo '<br />';
  }
  ?>
  <a class="btn-danger btn" href="index.php?c=makemeelvis&a=index">Back to make me elvis</a>
  <input class="btn btn-warning" type="submit" name="submit" value="Remove" />

</form>