<?php

include("../global.php");

//session_start();

$session->destroy();

header('location:login.php');
