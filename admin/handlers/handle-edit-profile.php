

<?php

//session_start();

include("../../global.php");
// require_once("$root/admin/includes/db-connect.php");
use coursegator\classes\Validator;

use Coursegator\Classes\Hash;




?>

<?php


//mysqli_real_escape_string() is a function to solve sql query Error
//we will use  also htmlspecialchars() function to recover special chars like scripts
// we will use  also trim() function to recover spaces

if ($request->postHas('submit')) {

    //$id = $_SESSION['adminId'];

    //using session class
    $id = $session->get('adminId');


    $name = mysqli_real_escape_string($db->getConn(), $request->postClean('name'));
    $email = mysqli_real_escape_string($db->getConn(), $request->postClean('email'));
    $password = $request->post('password');        //we will take it as written to avoid special chars conversion
    $confirm_password = $request->post('confirm_password');




    $validator = new Validator;
    $validator->str($name, 255);
    $validator->email($email);


    //validations
//     $errors = [];

//     /*  //validate name:  (required / string / 255)
//         if(empty($name)){
//             $errors[] = "Name is required";
//         }elseif(! is_string($name) || is_numeric(($name))){
//             $errors[] = "Name must be string containing characters";
//         }elseif(strlen(($name)) > 255){
//             $errors[] = "Name length should not exceed 255 characters";
//         } */


//     $errors[] = validateName($name);




//     /*   //validate email (required / string / 255)
//         if(empty($email)){
//             $errors[] = "Email is required";
//         }elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){
//             $errors[] = "Mail is not valid";
//         }elseif(strlen(($email)) > 255){
//             $errors[] = "Email length should not exceed 255 characters";
//         }
//  */

//     $errors[] = validateEmail($email);




//     $errors = cleanErrors($errors);

//     //validate password
//     if (!empty($password)) {
//         if (!is_string($password)) {
//             $errors[] = "password must be string containing characters";
//         } elseif (strlen($password) < 5 || strlen($password) > 25) {
//             $errors[] = "password length must be between 5 and 25 chars";
//         } elseif ($password != $confirm_password) {
//             $errors[] = "Password and Confirm Password not matched";
//         }


//         $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
//     }




//password
$passwordIsEmpty = $validator->confirmPassword($password, $confirm_password, 5, 25);

if(! $passwordIsEmpty){
    //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    $hashedPassword = Hash::make($password);
}




    if ($validator->valid()) {

        if (! $passwordIsEmpty) {

            /* $sql = "update admins 
                    set name = '$name',
                    email = '$email',
                    `password` = '$hashedPassword'
                    where id = $id"; */
                $isUpdated = $db->update("admins", "name = '$name', email = '$email', `password` = '$hashedPassword'", "id = $id");   
        } else {
            /* $sql = "update admins 
                        set name = '$name',
                        email = '$email'
                        where id = $id"; */
                $isUpdated = $db->update("admins", "name = '$name', email = '$email'", "id = $id");
        }


        /*mysqli_query($conn, $sql)   matches  $isUpdated*/

        if ($isUpdated) {

            //$_SESSION['success'] = "you Updated profile successflly";

            //using session class
            $session->set('success', 'you Updated profile successflly');

            //$_SESSION['adminName'] = $name;                        //to change the admin name beside the logo
            $session->set('adminName', $name);
        }


        //mysqli_close($conn);
    } else {
        //$_SESSION['errors'] = $errors;
        $session->set('errors', $validator->getErrors());
    }
    header("location:../edit-profile.php");
}






?>
