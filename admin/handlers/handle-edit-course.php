<!-- like handle-add-category.php -->

<!-- <?php echo "<pre>";
        print_r($_POST);
        echo "<pre>"; ?> -->


<?php

//session_start();

include("../../global.php");
// require_once("$root/admin/includes/db-connect.php");

use Coursegator\Classes\Validator;
use Coursegator\Classes\Hash;




?>





<?php


//mysqli_real_escape_string() is a function to solve sql query Error
//we will use  also htmlspecialchars() function to recover special chars like scripts
// we will use  also trim() function to recover spaces

if (isset($_POST['submit'])) {

    $id = $_GET['id'];
    $imgOldName = $_GET['imgOldName'];

    $name = mysqli_real_escape_string($conn, trim(htmlspecialchars($_POST['name'])));
    $desc = mysqli_real_escape_string($conn, trim(htmlspecialchars($_POST['desc'])));
    $cat_id = mysqli_real_escape_string($conn, trim(htmlspecialchars($_POST['cat_id'])));



    /* echo "<pre>"; print_r($_FILES['img']); echo "<pre>";
        die(); */


    $img = $_FILES['img'];

    if (!empty($img['name'])) {

        $imgName = $img['name'];
        $imgType = $img['type'];
        $imgError = $img['error'];
        $imgSize = $img['size'];
        $imgTempName = $img['tmp_name'];
    }





    //validations
    $errors = [];

    /* //validate name:  (required / string / 255)
    if(empty($name)){
        $errors[] = "Name is required";
    }elseif(! is_string($name) || is_numeric(($name))){
        $errors[] = "Name must be string containing characters";
    }elseif(strlen(($name)) > 255){
        $errors[] = "Name length should not exceed 255 characters";
    }
 */



    $validator = new Validator;

    //$errors[] = validateName($name);
    $validator->str($name, "name", 255);
    $validator->str($desc, "description");

    //validate description:  (required / string )
   /*  if (empty($desc)) {
        $errors[] = "description is required";
    } elseif (!is_string($desc) || is_numeric(($desc))) {
        $errors[] = "description must be string containing characters";
    } */
    
    if (empty($desc)) {
        $errors[] = "description is required";
    } elseif (!is_string($desc) || is_numeric(($desc))) {
        $errors[] = "description must be string containing characters";
    }


    //validate cat_id:  (required )
    /* if (empty($cat_id)) {
        $errors[] = "category is required";
    } */


    $validator->required($cat_id, "Category Id");


    //img: no errors, available extension, max 2MB
    if (!empty($img['name'])) {
        // $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $randomStr = uniqid();
        $imgExtension = pathinfo($imgName, PATHINFO_EXTENSION);





        $imgSizeMb = $imgSize / (1024 ** 2);


        $validator->image($imgError, $imgExtension, $imgSizeMb);



        /* if ($imgError != 0) {
            $errors[] = "error while uploading image<br>";
        } elseif (!in_array($imgExtension, $allowedExtensions)) {
            $errors[] = "exttension is not valid, extensions are jpg, jpeg, png and gif <br>";
        } elseif ($imgSizeMb > 2) {
            $errors[] = "max allowed size is 2 MB <br>";
        } */
    }












    //$errors = cleanErrors($errors);
    /* if(empty($errors)){

        //insert data in reservations table

        if(!empty($img['name'])){

            //to update image, we will remove the old image and then add the new image

            //remove img
            unlink("../../uploads/courses/$imgOldName");

            //add a new img
            $randomStr = uniqid();
            
            $imgNewName = "$randomStr.$imgExtension";
            move_uploaded_file($imgTempName, "../../uploads/courses/$imgNewName");

            
            $sql = "update courses set 
            name = '$name',
            `desc` = '$desc',
            cat_id = '$cat_id',
            img = '$imgNewName'
            where id = $id";

        }else{

            $sql = "update courses set 
            name = '$name',
            `desc` = '$desc',
            cat_id = $cat_id
            where id = $id";
        }

        if (mysqli_query($conn, $sql) == true) {
            //redirect back with success message
            $_SESSION['success'] = "you Updated course successflly";
            header("location:../all-courses.php");
        }
        //mysqli_close($conn);
            
            
        } else {
            $_SESSION['errors'] = $errors;
            header("location:../edit-course.php?id=$id");
           
        } */















    if ($validator->valid()) {

        //insert data in reservations table

        if (!empty($img['name'])) {

            //to update image, we will remove the old image and then add the new image

            //remove img
            unlink("../../uploads/courses/$imgOldName");

            //add a new img
            $randomStr = uniqid();

            $imgNewName = "$randomStr.$imgExtension";
            move_uploaded_file($imgTempName, "../../uploads/courses/$imgNewName");


           /*  $isUpdated = update(
                $conn,
                "courses",
                "name = '$name',`desc` = '$desc', cat_id = '$cat_id', img = '$imgNewName'",
                "id = $id"
            ); */

            $isUpdated = $db->update(
                "courses",
                "name = '$name',`desc` = '$desc', cat_id = '$cat_id', img = '$imgNewName'",
                "id = $id"
            );
        } else {

            /* $isUpdated = update(
                $conn,
                "courses",
                "name = '$name',`desc` = '$desc', cat_id = '$cat_id'",
                "id = $id"
            ); */
            $isUpdated = $db->update(
                "courses",
                "name = '$name',`desc` = '$desc', cat_id = '$cat_id'",
                "id = $id"
            );
        }

        if ($isUpdated) {
            //redirect back with success message
            $_SESSION['success'] = "you Updated course successflly";
            header("location:../all-courses.php");
        }
        //mysqli_close($conn);} else {
            $session->set('errors', $validator->getErrors());
        header("location:../edit-course.php?id=$id");
    }
}



?>