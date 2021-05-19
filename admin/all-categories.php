<?php 
include("../global.php");
include("$root/admin/includes/header.php") ?>

<?php 
                        
     /* $sql = "SELECT * FROM cats";
     $result = mysqli_query($conn, $sql);

     if (mysqli_num_rows($result) > 0) {
     // output data of each row
         $cats = mysqli_fetch_all($result, MYSQLI_ASSOC);
     } else {
         $cats = [];
     } */



     $cats = select($conn, "*", "cats");
?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">All Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active"> Categories</li>
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
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
        <?php foreach($cats as $key => $cat){?>             <!--  use key to make id autoincrement id as $cats is numeric array but $cat is assosiative array (we cavn get its index from foreach loop)
           -->
            <tr>
                <td><?= $key + 1; ?></td>                <!-- we didn't use $key not $cat['id'] to get row id to avoid id problem if we delete row-->                            
                <td><?= $cat['name']; ?></td>
                <td><?= $cat['created_at']; ?></td>
                <td>
                    <a class="btn btn-sm btn-info" href="edit-category.php?id=<?= $cat['id']; ?>">Edit</a>
                    <a class="btn btn-sm btn-danger" href="delete-category.php?id=<?= $cat['id']; ?>">Delete</a>
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