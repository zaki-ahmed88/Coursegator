<!-- <?php echo "<pre>";
        print_r($_POST);
        echo "<pre>"; ?> -->


<?php

//session_start();

include "../../global.php";
//require_once "$root/admin/includes/db-connect.php";

?>





<?php

//mysqli_real_escape_string() is a function to solve sql query Error
//we will use  also htmlspecialchars() function to recover special chars like scripts
// we will use  also trim() function to recover spaces

if (isset($_POST['submit'])) {

    $name = mysqli_real_escape_string($conn, trim(htmlspecialchars($_POST['name'])));
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
} */

$errors[] = validateName($name);

$errors = cleanErrors($errors);

/* if(empty($errors)){

//insert data in reservations table

$sql = "INSERT INTO cats (name)
VALUES ('$name')";

if (mysqli_query($conn, $sql) == true) {
//redirect back with success message
$_SESSION['success'] = "you added category successflly";
header("location:../all-categories.php");
}
//mysqli_close($conn);

} else {
$_SESSION['errors'] = $errors;
header("location:../add-category.php");

} */

if (empty($errors)) {

    //insert data in reservations table

    $isInserted = insert(
        $conn,
        "cats",
        "name",
        "'$name'"
    );

    if ($isInserted) {
        //redirect back with success message
        $_SESSION['success'] = "you added category successflly";
        header("location:../all-categories.php");
    }
    //mysqli_close($conn);
} else {
    $_SESSION['errors'] = $errors;
    header("location:../add-category.php");
}

?>