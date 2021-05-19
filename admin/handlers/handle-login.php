
<?php /* echo "<pre>"; print_r($_POST); echo "<pre>"; */ ?>

<?php /* session_start(); 

require_once('../includes/db-connect.php');             //includes
 */


include('../../global.php');

use Coursegator\Classes\Validator;
use Coursegator\Classes\Hash;


if(isset($_POST['submit'])){

    $email = mysqli_real_escape_string($db->getConn(), trim(htmlspecialchars($_POST['email'])));
    $password = mysqli_real_escape_string($db->getConn(), trim(htmlspecialchars($_POST['password'])));



    //validations
    //$errors = [];

    $validator = new Validator;

    //validate email (required / string / 255)
   /*  if(empty($email)){
        $errors[] = "Email is required";
    }elseif(! filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errors[] = "Mail is not valid";
    }elseif(strlen(($email)) > 255){
        $errors[] = "Email length should not exceed 255 characters";
    }
 */

 $validator->email($email);


    //password: required | string | min:5 / max:25
   /*  if(empty($password)){
        $errors[] = "passsword is required";
    }elseif(! is_string($password)){
        $errors = "passsword must be string";
    }elseif(strlen($password) < 5 || strlen($password) > 25){
        $errors[] = "password length must be between 5 and 25 chars";
    } */

    $validator->password($password, 5, 25);



    if($validator->valid()){
        //select row by email
        /* $sql = "select * from admins where email = '$email'";
        $result = mysqli_query($conn, $sql); */
        $admin = $db->selectOne("*", "admins", "where email = '$email'");

        //mysqli_num_rows ($result) > 0

        if(! empty($admin)){               
           /*  $admin = mysqli_fetch_assoc($result);
            echo "<pre>"; print_r($admin); echo "<pre>"; 
 */


            //password_verify($password, $admin['password'])
            if(Hash::check($password, $admin['password'])){            //Hash is static method
                //save user data in session and redirect to admin index

                /* $_SESSION['adminId'] = $admin['id'];                        //we store adminId as we need it in edit profile.php
                $_SESSION['adminName'] = $admin['name'];
                $_SESSION['isLogin'] = true;

                header('location:../index.php'); */

                $session->set('adminId', $admin['id']);
                $session->set('adminName', $admin['name']);
                $session->set('isLogin', true);

                header('location:../index.php');


            }else{
                $_SESSION['loginError'] = "Password is not correct";
                header('location:../login.php');
            }
           
            
        }else{
            
            // $_SESSION['loginError'] = "Email is not registered";
            $session->set('loginError', "Email is not registered");
            header('location:../login.php');
        }

    }else{
        //$_SESSION['errors'] = $errors;
        $session->set('errors', $validator->getErrors());
        header('location:../login.php');
    }



}














?>
