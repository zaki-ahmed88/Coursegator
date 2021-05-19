<?php 
include("../global.php");
include("$root/admin/includes/header.php") ?>


<?php 
                                
    if(isset($_GET['id'])){
      
      $id = $_GET['id'];
      $sql = "select reservations.*, courses.name as courseName
      from reservations 
      join courses 
      on reservations.course_id = courses.id
      where reservations.id = $id";

      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) > 0) {
      // output data of only one row
      $reserve = mysqli_fetch_assoc($result);
      } else {
          $reserve = [];
      }

    }
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Enrollment</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Courses</li>
              <li class="breadcrumb-item active">Add</li>
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

            <div class="col-md-6">
              <div class="card card-primary">
                <div class="card-body">
                  <p>
                    <strong>Name: </strong><?= $reserve['name']; ?>
                  </p>
                  <p>
                    <strong>Email: </strong><?= $reserve['email']; ?>
                  </p>
                  <p>
                    <strong>Phone: </strong><?= $reserve['phone']; ?>
                  </p>
                  <p>
                    <strong>Speciality: </strong><?= $reserve['spec']; ?>
                  </p>
                  <p>
                    <strong>Course Name: </strong><?= $reserve['courseName']; ?>
                  </p>

                </div>
                

              </div>
                

            </div>
    
        


          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include("$root/admin/includes//footer.php") ?>

 