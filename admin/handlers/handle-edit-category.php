<!-- like handle-add-category.php -->

<!-- <?php echo "<pre>";
        print_r($_POST);
        echo "<pre>"; ?> -->


<?php

//session_start();

include("../../global.php");
// require_once("$root/admin/includes/db-connect.php");
use Coursegator\Classes\Validator;


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
?>





<?php


//mysqli_real_escape_string() is a function to solve sql query Error
//we will use  also htmlspecialchars() function to recover special chars like scripts
// we will use  also trim() function to recover spaces

if (isset($_POST['submit'])) {



    $id = $_GET['id'];


    $name = mysqli_real_escape_string($db->getConn(), trim(htmlspecialchars($_POST['name'])));


    /*  //validate name:  (required / string / 255)
        if(empty($name)){
            $errors[] = "Name is required";
        }elseif(! is_string($name) || is_numeric(($name))){
            $errors[] = "Name must be string containing characters";
        }elseif(strlen(($name)) > 255){
            $errors[] = "Name length should not exceed 255 characters";
        } */

//    $errors[] = validateName($name);




//    $errors = cleanErrors($errors);



    $validator = new Validator;

    //$errors[] = validateName($name);
    $validator->str($name, "name", 255);







    //validations

    /* if(empty($errors)){

            //insert data in reservations table

            $sql = "update cats set name = '$name' where id = $id";

            if (mysqli_query($conn, $sql) == true) {
                //redirect back with success message
                $_SESSION['success'] = "you Updated category successflly";
                header("location:../all-categories.php");
            }
            //mysqli_close($conn);


            } else {
                $_SESSION['errors'] = $errors;
                header("location:../edit-category.php?id=$id");

            } */





//    if (empty($errors)) {
//
//        //insert data in reservations table
//
//        $sql = "update cats set name = '$name' where id = $id";
//
//        $isUpdated = update(
//            $conn,
//            "cats",
//            "name = '$name'",
//            "where id = $id"
//        );
//
//
//
//        if ($isUpdated) {
//            //redirect back with success message
//            $_SESSION['success'] = "you Updated category successflly";
//            header("location:../all-categories.php");
//        }
//        //mysqli_close($conn);
//        else{
//            header("location:../edit-category.php?id=$id");
//        }
//    } else {
//        $_SESSION['errors'] = $errors;
//        header("location:../edit-category.php?id=$id");
//    }
}



if (empty($errors)) {



            $isUpdated = $db->update(
                "cats",
                "name = '$name'",
                "id = $id"
            );



        if ($isUpdated) {
            //redirect back with success message
            $_SESSION['success'] = "you Updated category successflly";
            header("location:../all-categories.php");
        }else {
            //mysqli_close($conn);} else {
            $session->set('errors', $validator->getErrors());
            header("location:../edit-category.php?id=$id");

        }
}





?>