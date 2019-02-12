<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 12/02/2019
 * Time: 4:15 PM
 */
  include ("dbconnect.php");
?>
<img src="../images/blankface.jpg" width="161" height="350" alt="" style="float:right" />
<img name="elvislogo" src="../images/elvislogo.gif" width="229" height="32" border="0" alt="Make Me Elvis" />
<p><strong>Private:</strong> For Elmer's use ONLY<br />
  Write and send an email to mailing list members.</p>
<?php
if (isset($_POST['Submit'])) {
  $from = 'elmer@makemeelvis.com';
  $subject = $_POST['subject'];
  $text = $_POST['elvismail'];
  $output_form = false;

  if (empty($subject) && empty($text)) {
    // We know both $subject AND $text are blank
    echo 'You forgot the email subject and body text.<br />';
    $output_form = true;
  }

  if (empty($subject) && (!empty($text))) {
    echo 'You forgot the email subject.<br />';
    $output_form = true;
  }

  if ((!empty($subject)) && empty($text)) {
    echo 'You forgot the email body text.<br />';
    $output_form = true;
  }
}
else {
  $output_form = true;
}

if ((!empty($subject)) && (!empty($text))) {
  $query = "SELECT * FROM email_list";
  $result = mysqli_query($dbc, $query)
  or die('Error querying database.');
  while ($row = mysqli_fetch_array($result)){
    $to = $row['email'];
    $first_name = $row['first_name'];
    $last_name = $row['last_name'];
    $msg = "Dear $first_name $last_name,\n$text";
    mail($to, $subject, $msg, 'From:' . $from);
    echo '<h1>Email sent to: <span class="text-danger">' . $to . '</span></h1><br /> ';
  }
  echo '<a class="btn-danger btn" href="index.php?c=makemeelvis&a=index">Back to make me elvis</a>';
}

if ($output_form) {
  ?>
  <form method="post" action="index.php?c=makemeelvis&a=sendemail">
    <label for="subject">Subject of email:</label><br />
    <input id="subject" name="subject" type="text" size="30" /><br />
    <label for="elvismail">Body of email:</label><br />
    <textarea id="elvismail" name="elvismail" rows="8" cols="40" ></textarea><br />
    <a class="btn-danger btn" href="index.php?c=makemeelvis&a=index">Back to make me elvis</a>
    <input class="btn btn-success" type="submit" name="Submit" value="Submit" />
  </form>
  <?php
}
?>
