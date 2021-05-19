
<?php

//session_start();

include("../global.php");

require_once("$root/admin/includes/db-connect.php");



?>


<?php


/* if(isset($_GET['id'])){

    $id = $_GET['id'];
    $sql = "delete from cats where id = $id";

    if (mysqli_query($conn, $sql) == true) {
        //redirect back with success message
        $_SESSION['success'] = "you deleted category successflly";
        
    }

    header("location:all-categories.php");

} */





if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $isDeleted = delete($conn, "cats", "id = $id");

    if ($isDeleted) {
        //redirect back with success message
        $_SESSION['success'] = "you deleted category successflly";
    }

    header("location:all-categories.php");
}

?>