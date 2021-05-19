
<?php

//global.php is included in all pages, so when we include functions.php in it, it will also be included in all pages

require_once("functions.php");            //require_once not include to avoid function repeatation



//$root = "C:/xampp/htdocs/workshop 2/coursegator-design";

$root = __DIR__;


$url = "http://localhost/workshop%202/coursegator/";



//mysqli_fetch_assoc()   is better than   mysqli_fetch_row()
//differences 

//Example
//mysqli_fetch_assoc($result)['name'];          //name
//mysqli_fetch_row($result)[0];                 //key



use Coursegator\Classes\Request;
use Coursegator\Classes\Session;
use Coursegator\Classes\Db;


//make object from Request class and use OOP
require_once("$root/classes/Request.php");
require_once("$root/classes/Session.php");
require_once("$root/classes/Db.php");
require_once("$root/classes/Validator.php");
require_once("$root/classes/Hash.php");










//objects
$request = new Request;
$session = new Session;      //used in handle-edit-profile.php

//we want to start session once object of session created, so we will use _construct()
$db = new Db("localhost", "root", "", "coursegator");
