<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 13/02/2019
 * Time: 9:35 AM
 */
?>
<h2>Guitar Wars - High Scores</h2>
<p>Welcome, Guitar Warrior, do you have what it takes to crack the high score list? If so, just <a href="index.php?c=guitarwars&a=addscore">add your own score</a>.</p>
<a class="btn btn-danger" href="http://vsheadfirstphpmysql/">Back to home page</a>
<a class="btn btn-primary" href="index.php?c=guitarwars&a=admin">admin</a>
<hr />
<?php
  require_once('appvars.php');
  include ("dbconnect.php");

  // Retrieve the score data from MySQL
  $query = "SELECT * FROM guitarwars WHERE approved = 1 ORDER BY score DESC, date ASC";
  $data = mysqli_query($dbc, $query);

  // Loop through the array of score data, formatting it as HTML
  echo '<table>';
  $i = 0;
  while ($row = mysqli_fetch_array($data)) {
    // Display the score data
    if ($i == 0) {
      echo '<tr><td colspan="2" class="topscoreheader">Top Score: ' . $row['score'] . '</td></tr>';
    }
    echo '<tr><td class="scoreinfo">';
    echo '<span class="score">' . $row['score'] . '</span><br />';
    echo '<strong>Name:</strong> ' . $row['name'] . '<br />';
    echo '<strong>Date:</strong> ' . $row['date'] . '</td>';
    if (is_file(GW_UPLOADPATH . $row['screenshot']) && filesize(GW_UPLOADPATH . $row['screenshot']) > 0) {
      echo '<td><img src="' . GW_UPLOADPATH . $row['screenshot'] . '" alt="Score image" /></td></tr>';
    }
    else {
      echo '<td><img src="' . GW_UPLOADPATH . 'unverified.gif' . '" alt="Unverified score" /></td></tr>';
    }
    $i++;
  }
  echo '</table>';

?>
