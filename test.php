

<?php

//relative path


//short path but if we change the project structure it will change also
//if there is nested include, it should be the same directory

include_once('includes/header.php');


//absolute path
//long path
include_once('C:/xampp/htdocs/workshop 2/coursegator-design/includes/header.php');


//     /   -> front slash





//there is a constant variable called __DIR__

echo __DIR__;              //it is course-gator path,   if i transfered the project to another path, it will work usually




//relative URLs to absolute URLs
//$url = "http://localhost/workshop%202/coursegator-design/";
//we will echo url before css or js or img src links in assets, and the form action
//header("location:$url" . "enroll.php");



//global.php is included in all pages, so when we include functions.php in it, it will also be included in all pages





//pagination
//page 1 --> offset 0
//page 2 --> offset 3 (3*1)
//page 3 --> offset 6 (3*2)



//we want 3 items in every page, so
//items = 3
//page no. = no
//offset = items * (page no. - 1)



