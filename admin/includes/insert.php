
<!-- <?php echo "<pre>"; print_r($_POST); echo "<pre>"; ?> -->


<?php 

session_start();

require_once("db-connect.php");



?>





<?php 


//mysqli_real_escape_string() is a function to solve sql query Error
//we will use  also htmlspecialchars() function to recover special chars like scripts
// we will use  also trim() function to recover spaces

    if(isset($_POST['submit'])){

        $x = mysqli_real_escape_string($conn, trim(htmlspecialchars($_POST['x'])) );
        
    }

    //validations
    $errors = [];

    //validate x:  (required / string / 255)
    if(empty($x)){
        $errors[] = "Name is required";
    }elseif(! is_string($x) || is_numeric(($x))){
        $errors[] = "Name must be string containing characters";
    }elseif(strlen(($x)) > 255){
        $errors[] = "Name length should not exceed 255 characters";
    }


    



    if(empty($errors)){

        //insert data in reservations table

        $sql = "INSERT INTO  ()
        VALUES ()";

        if (mysqli_query($conn, $sql)) {
            //redirect back with success message
            $_SESSION['success'] = "you added successflly";
        }
        mysqli_close($conn);
            
            
        } else {
            $_SESSION['errors'] = $errors;
           
        }
    

    header("location:");


?>
