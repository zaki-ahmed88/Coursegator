<!-- like handle-add-category.php -->

<?php
include("../global.php");
include("$root/admin/includes/header.php") ?>



<?php

//$id = $_SESSION['adminId'];
$id = $session->get('adminId');

/* $sql = "select name, email from admins where id = $id";       //we didn't select password as it is hashed and couldn't be fetched again (only verify)
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  $admin = mysqli_fetch_assoc($result);
} */
$admin = $db->selectOne("name, email", "admins", "where id = $id");

/* if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "select name from cats where id = $id";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $cat = mysqli_fetch_assoc($result);
    }
} */

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Edit Profile</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
            <li class="breadcrumb-item active">Edit</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <div class="content">
    <div class="container">
      <div class="row">

        <div class="col-8">
          <?php include("$root/admin/includes//errors.php") ?>
          <?php include("$root/admin/includes//success.php") ?>

          <form action="handlers/handle-edit-profile.php" method="POST">
            <!-- we didn't send id as aparameter as it is stored in session => $id = $_SESSION['adminId'] -->

            <div class="form-group">
              <label>Name</label>
              <input type="text" class="form-control" name="name" value="<?= $admin['name']; ?>">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email" value="<?= $admin['email']; ?>">
            </div>


            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
            </div>

            <div class="form-group">
              <label>Confirm Password</label>
              <input type="password" class="form-control" name="confirm_password">
            </div>


            <div class="card-footer">
              <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </div>
          </form>

        </div>





      </div>
      <!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include("$root/admin/includes//footer.php") ?>