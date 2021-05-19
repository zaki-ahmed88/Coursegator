
<?php

//session_start();

include("../global.php");
require_once("$root/admin/includes/db-connect.php");



?>


<?php


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $imgOldName = $_GET['imgOldName'];

    //to delete photo from upload file we will use unlink() function
    unlink("../uploads/courses/$imgOldName");


    $sql = "delete from courses where id = $id";

    if (mysqli_query($conn, $sql) == true) {
        //redirect back with success message
        $_SESSION['success'] = "you deleted course successflly";
    }

    header("location:all-courses.php");
}

?>