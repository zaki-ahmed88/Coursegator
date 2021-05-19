<?php 
include("../global.php");
include("$root/admin/includes/header.php") ?>


<?php 
                        
     $sql = "SELECT courses.*, cats.id as catId, cats.name as catName FROM courses join cats
     on courses.cat_id = cats.id";

     $result = mysqli_query($conn, $sql);

     if (mysqli_num_rows($result) > 0) {
     // output data of each row
         $courses = mysqli_fetch_all($result, MYSQLI_ASSOC);
     } else {
         $courses = [];
     }
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Courses</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Courses</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        

      <?php include("$root/admin/includes//success.php") ?>


    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Image</th>
            <th scope="col">Category</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($courses as $key => $course){?>             <!--  use key to make id autoincrement id as $courses is numeric array but $course is assosiative array (we cavn get its index from foreach loop)
           -->
            <tr>
                <td><?= $key + 1; ?></td>                <!-- we didn't use $key not $course['id'] to get row id to avoid id problem if we delete row-->                            
                <td><?= $course['name']; ?></td>
                <td>
                  <img src="../uploads/courses/<?= $course['img']; ?>" alt="" height="50px">
                </td>
                <td><?= $course['desc']; ?></td>                                        <!-- we can get course['name'] because we make join condition in sql statement -->
                <td><?= $course['created_at']; ?></td>
                <td>
                    <a class="btn btn-sm btn-info" href="edit-course.php?id=<?= $course['id']; ?>">Edit</a>
                    <a class="btn btn-sm btn-danger" href="delete-course.php?id=<?= $course['id']; ?>&imgOldName=<?= $course['img']; ?>">Delete</a>
                </td>
            </tr>
    
        <?php }?>

   
        </tbody>
    </table>





        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include("$root/admin/includes//footer.php") ?>