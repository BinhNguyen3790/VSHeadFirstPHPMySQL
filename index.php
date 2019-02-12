<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 10/02/2019
 * Time: 11:19 AM
 */
  include ("dbconnect.php");
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="shortcut icon" href="images/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="css/icons.css">
  <link rel="stylesheet" href="css/styles.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/Chart.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/js.js"></script>
  <title>VirusS Head First PHP Mysql</title>
</head>
<body>
  <!-- Header -->
  <?php include ("header.php"); ?>
  <!-- Main -->
  <!-- Page Content -->
  <div class="container">
    <div class="card border-0 shadow my-5">
      <div class="card-body p-5">
        <?php
          if (!isset($_GET['c']) && !isset($_GET['a'])){
            include ("main.php");
          }
          if(isset($_GET['c']) && !isset($_GET['a'])){
            $c= $_GET['c'];
            include ("$c.php");
          }
          if (isset($_GET['c']) && isset($_GET['a'])){
            $c= $_GET['c'];
            $a= $_GET['a'];
            include ("$c/$a.php");
          }
        ?>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <?php include ("footer.php"); ?>
</body>
</html>
