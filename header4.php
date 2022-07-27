<?php

//header.php

include('admin/database_connection.php');
session_start();

if(!isset($_SESSION["teacher_id"]))
{
  header('');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Student Attendance System in PHP using Ajax</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/dataTables.bootstrap4.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.dataTables.min.js"></script>
  <script src="js/dataTables.bootstrap4.min.js"></script>
</head>
<body >


<div class="jumbotron-small text-center" style="margin-bottom:0">
<img src="pic/manit_logo.png" alt="manit logo" width="125" height="125">

<span style="font-size: 40px; font-weight: 700;">Canteen Attendance System</span>
</div>
</div>



<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div style="margin-left: 120px;">
  <a class="navbar-brand" href=""></a>
  <a class="navbar-brand" href=""></a>
  </div>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
     
    </ul>
  </div>  
</nav>