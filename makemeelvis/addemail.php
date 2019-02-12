<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 12/02/2019
 * Time: 3:09 PM
 */
  include ("dbconnect.php");
?>
<img src="../images/blankface.jpg" width="161" height="350" alt="" style="float:right" />
<img name="elvislogo" src="../images/elvislogo.gif" width="229" height="32" border="0" alt="Make Me Elvis" />
<p>Enter your first name, last name, and email to be added to the <strong>Make Me Elvis</strong> mailing list.</p>
<?php
if (isset($_POST['Submit'])) {
  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $email = $_POST['email'];
  $output_form = 'no';

  if (empty($first_name) || empty($last_name) || empty($email)) {
    // We know at least one of the input fields is blank
    echo 'Please fill out all of the email information.<br />';
    $output_form = 'yes';
  }
}
else {
  $output_form = 'yes';
}
if (!empty($first_name) && !empty($last_name) && !empty($email)) {
  $query = "INSERT INTO email_list (first_name, last_name, email)  
    VALUES ('$first_name', '$last_name', '$email')";
  mysqli_query($dbc, $query)
  or die ('Data not inserted.');
  echo '<h1 class="text-success">Customer added.</h1><br /> 
    <a class="btn-danger btn" href="index.php?c=makemeelvis&a=index">Back to make me elvis</a>';
}
if ($output_form == 'yes') {?>
  <form method="post" action="index.php?c=makemeelvis&a=addemail">
    <label for="firstname">First name:</label>
    <input type="text" id="firstname" name="firstname" /><br />
    <label for="lastname">Last name:</label>
    <input type="text" id="lastname" name="lastname" /><br />
    <label for="email">Email:</label>
    <input type="text" id="email" name="email" /><br />
    <a class="btn-danger btn" href="index.php?c=makemeelvis&a=index">Back to make me elvis</a>
    <input class="btn btn-primary" type="submit" name="Submit" value="Submit" />
  </form>
<?php } ?>