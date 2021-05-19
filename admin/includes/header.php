<?php

//session_start();

require_once("../global.php");         //require_once not include in header.php

if (!isset($_SESSION['isLogin']) or $_SESSION['isLogin'] == false) {
  header("location::login.php");
}




//we will comment this db connecion as we will use Db class and we use oop connection instead of this
//Db class and makeuse of OOP connection

//from here
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "coursegator";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
//to here

?>


<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>AdminLTE 3</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="assets/css/fontawesome.all.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Coursegator</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="assets/img/user-profile.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $_SESSION['adminName']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->




            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link ">
                <i class="fas fa-sitemap nav-icon"></i>
                <p>
                  Categories
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="all-categories.php" class="nav-link ">
                    <i class="fas fa-list nav-icon"></i>
                    <p>All Categories</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="add-category.php" class="nav-link">
                    <i class="fas fa-plus-square nav-icon"></i>
                    <p>Add Category</p>
                  </a>
                </li>
              </ul>
            </li>




            <li class="nav-item has-treeview ">
              <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Courses
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="all-courses.php" class="nav-link ">
                    <i class="far fa-circle nav-icon"></i>
                    <p>All Courses</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="add-course.php" class="nav-link">
                    <i class="fas fa-book nav-icon"></i>
                    <p>Add Course</p>
                  </a>
                </li>
              </ul>
            </li>





            <li class="nav-item">
              <a href="all-enrollments.php" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>
                  Enrollments
                </p>
              </a>
            </li>



            <li class="nav-item">
              <a href="edit-profile.php" class="nav-link">
                <i class="fas fa-user-edit nav-icon"></i>
                <p>
                  Edit Profile
                </p>
              </a>
            </li>



            <li class="nav-item">
              <a href="logout.php" class="nav-link">
                <i class="fas fa-sign-out-alt nav-icon"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>







          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>