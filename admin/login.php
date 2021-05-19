<!-- 
    
//insert into admins (`name`, email, password) values ('zaki admin', 'zaki.admin.com', '$2y$10$ih65HztR2JBgeW/lfKgPO.dxxDlv2XANqTlO5plqZwghmyANtMzR.')


//echo password_hash("123456", PASSWORD_DEFAULT);
// or go to     https://phppasswordhash.com/

//$2y$10$ih65HztR2JBgeW/lfKgPO.dxxDlv2XANqTlO5plqZwghmyANtMzR.



//go to  search   admin lte v3 login form

 -->



<?php

//session_start();

include("../global.php");


?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Dashboard | Login</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/css/fontawesome.all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="assets/css/adminlte.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Login</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">

        <?php include("$root/admin/includes/errors.php"); ?>


        <?php if (isset($_SESSION['loginError'])) { ?>
          <div class="alert alert-danger">
            <?= $_SESSION['loginError']; ?>
            <?php unset($_SESSION['loginError']) ?>
          </div>
        <?php } ?>


        <form action="handlers/handle-login.php" method="post">
          <div class="input-group mb-3">
            <input type="email" name="email" class="form-control" placeholder="Email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" name="password" class="form-control" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>

          <div class="row">

            <!-- /.col -->
            <div class="col-12">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Login In</button>
            </div>
            <!-- /.col -->
          </div>


        </form>


        <!-- /.social-auth-links -->


      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="assets/js/jquery/jquery.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/js/bootstrap/js/bootstrap.bundle.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/js/adminlte.js"></script>

</body>

</html>