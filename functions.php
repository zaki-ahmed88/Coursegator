
<?php

//validation

function validateEmail($email)
{

    if (empty($email)) {
        return "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Mail is not valid";
    } elseif (strlen(($email)) > 255) {
        return "Email length should not exceed 255 characters";
    }

}

function cleanErrors($errors)
{
    foreach ($errors as $index => $error) {
        if ($error == null) {
            unset($errors[$index]);
        }
    }

    return $errors;
}

function validateName($name)
{

    if (empty($name)) {
        return "Name is required";
    } elseif (!is_string($name) || is_numeric(($name))) {
        return "Name must be string containing characters";
    } elseif (strlen(($name)) > 255) {
        return "Name length should not exceed 255 characters";
    }
}

//database

function insert($conn, $table, $fields, $values)
{
    $sql = "insert into $table($fields) values($values)";
    $isInserted = mysqli_query($conn, $sql);
    return $isInserted;
}



function update($conn, $table, $set, $condition)
{
    $sql = "update $table set $set where $condition";
    $isUpdated = mysqli_query($conn, $sql);
    return $isUpdated;
}








function delete($conn, $table, $condition)
{
    $sql = "delete from $table where $condition";
    $isDeleted = mysqli_query($conn, $sql);
    return $isDeleted;
}





function select($conn, $fields, $table, $others = null)            //default value of $others is null as we want it optional
{
    $sql = "SELECT $fields FROM $table";

    //if $others added then concat to the query
    if($others !== null){
        $sql .= " $others";
    }

    $result = mysqli_query($conn, $sql);

     if (mysqli_num_rows($result) > 0) {
     // output data of each row
         $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
     } else {
         $rows = [];
     }
     return $rows;
}





//selection limit one

function selectOne($conn, $fields, $table, $others = null)         
{
    $sql = "SELECT $fields FROM $table";

    if($others !== null){
        $sql .= " $others";
    }

    $sql .= " limit 1";

    $result = mysqli_query($conn, $sql);

     if (mysqli_num_rows($result) == 1) {
     // output data of each row
         $row = mysqli_fetch_assoc($result);
     } else {
         $row = [];
     }
     return $row;
}








function selectJoin($conn, $fields, $tables, $on, $others = null)           
{
    $sql = "SELECT $fields FROM $tables on $on";

    //if $others added then concat to the query
    if($others !== null){
        $sql .= " $others";
    }

    $result = mysqli_query($conn, $sql);

     if (mysqli_num_rows($result) > 0) {
     // output data of each row
         $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
     } else {
         $rows = [];
     }
     return $rows;
}









function selectJoinOne($conn, $fields, $tables, $one, $others = null)                      //we will not use it here
{   
    $sql = "SELECT $fields FROM $tables on $one";

    if($others !== null){
        $sql .= " $others";
    }

    $sql .= " limit 1";

    $result = mysqli_query($conn, $sql);

     if (mysqli_num_rows($result) == 1) {
     // output data of each row
         $row = mysqli_fetch_assoc($result);
     } else {
         $row = [];
     }
     return $row;
}