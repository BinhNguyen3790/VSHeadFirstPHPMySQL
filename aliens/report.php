<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 11/02/2019
 * Time: 9:13 AM
 */
  include ("dbconnect.php");
?>
<h2>Aliens Abducted Me - Report an Abduction</h2>
<?php
  $first_name = $_POST['firstname'];
  $last_name = $_POST['lastname'];
  $when_it_happened = $_POST['whenithappened'];
  $how_long = $_POST['howlong'];
  $how_many = $_POST['howmany'];
  $alien_description = $_POST['aliendescription'];
  $what_they_did = $_POST['whattheydid'];
  $fang_spotted = $_POST['fangspotted'];
  $email = $_POST['email'];
  $other = $_POST['other'];

  $query = "INSERT INTO aliens_abduction (first_name, last_name, when_it_happened, how_long, " .
    "how_many, alien_description, what_they_did, fang_spotted, other, email) " .
    "VALUES ('$first_name', '$last_name', '$when_it_happened', '$how_long', '$how_many', " .
    "'$alien_description', '$what_they_did', '$fang_spotted', '$other', '$email')";

  $result = mysqli_query($dbc, $query)
  or die('Error querying database.');

//        $to = "nguyenvanbinh3479@gmail.com";
//        $subject = "Aliens Abducted Me - Abduction Report";
//        $msg ="$email send email to you.\n" .
//          "$name was abducted $when_it_happened and was gone for $how_long.\n" .
//          "Number of aliens: $how_many\n" .
//          "Alien description: $alien_description\n" .
//          "What they did: $what_they_did\n" .
//          "Fang spotted: $fang_spotted\n" .
//          "Other comments: $other";
//        mail($to, $subject, $msg, 'From:' . $email);
  echo 'Thanks for submitting the form.<br />';
  echo 'You were abducted <span class="text-danger">' . $when_it_happened . '</span>';
  echo ' and were gone for <span class="text-danger">' . $how_long . '</span><br />';
  echo 'Number of aliens: <span class="text-danger">' . $how_many . '</span><br />';
  echo 'Describe them: <span class="text-danger">' . $alien_description . '</span><br />';
  echo 'The aliens did this: <span class="text-danger">' . $what_they_did . '</span><br />';
  echo 'Was Fang there? <span class="text-danger">' . $fang_spotted . '</span><br />';
  echo 'Other comments: <span class="text-danger">' . $other . '</span><br />';
  echo 'Your email address is <span class="text-danger">' . $email . '</span><br />';
  echo '<a class="btn btn-success" href="index.php?c=aliens&a=index">Continues</a>';
?>

