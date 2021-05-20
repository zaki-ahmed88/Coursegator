
<!-- like handle-add-category.php -->

<?php


include("../global.php");
include("$root/admin/includes/header.php") ?>



<?php 

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "select name from cats where id = $id";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0){
        $cat = mysqli_fetch_assoc($result);
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
            <h1 class="m-0 text-dark">Edit Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
                
                <form action="handlers/handle-edit-category.php?id=<?= $id; ?>" method="POST">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Name</label>
                      <input type="text" class="form-control" id="exampleInputEmail1" name="name" value="<?= $cat['name']; ?>">
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

 