<?php
/**
 * Created by PhpStorm.
 * User: VirusS
 * Date: 10/02/2019
 * Time: 11:19 AM
 */
  session_start();
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
  <?php

  if (!isset($_GET['page'])){
    include ("main.php");
  }else{
    $page= $_GET['page'];
    include ("$page.php");
  }
  ?>
  <!-- Footer -->
  <?php include ("footer.php"); ?>
</body>
</html>
