<?php

namespace Coursegator\Classes;

class Request{


    //get function -> in show-category.php  and  all-courses.php
    public function get($key){

        return $_GET[$key];
    }


    public function getHas($key){

        return isset($_GET[$key]);
    }



    //post function -> in handle-edit-profile.php
    public function post($key){

        return $_POST[$key];
    }




    public function postClean($key){

        return trim(htmlspecialchars($_POST[$key]));
    }




    public function postHas($key){

        return isset($_POST[$key]);
    }

}