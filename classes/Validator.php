<?php

namespace Coursegator\Classes;

class Validator{

        //validation

    private $errors = [];    

    public function email($email)
    {

        if (empty($email)) {
            $this->errors[] =  "Email is required";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->errors[] =  "Mail is not valid";
        } elseif (strlen(($email)) > 255) {
            $this->errors[] =  "Email length should not exceed 255 characters";
        }

    }


    public function str($str, $inputName, $max = null)
    {

        if (empty($str)) {
            $this->errors[] = "$inputName is required";
        } elseif (!is_string($str) || is_numeric(($name))) {
            $this->errors[] = "$inputName must be string containing characters";
        } elseif ($max != null and strlen(($name)) > $max) {
            $this->errors[] = "$inputName length should not exceed $max characters";
        }
    }







    public function confirmPassword($password, $confirm_password, $min, $max)
    {

        if (!empty($password)) {
            if (!is_string($password)) {
                $this->errors[] = "password must be string containing characters";
                } elseif (strlen($password) < $min || strlen($password) > $max) {
                    $this->errors[] = "password length must be between $min and $max chars";
                } elseif ($password != $confirm_password) {
                    $this->errors[] = "Password and Confirm Password not matched";
                }
            
            
                //$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                return false;
        }
        return true;
    }






    public function password($password, $min, $max)
    {

        if (empty($password)) {
             $this->errors[] = "password is required";    
        }elseif (!is_string($password)) {
            $this->errors[] = "password must be string containing characters";
        } elseif (strlen($password) < $min || strlen($password) > $max) {
            $this->errors[] = "password length must be between $min and $max chars";
        }
            
    }






    public function valid(){
        if(empty($this->errors)){
            return true;
        }
            return false; 
        
    }


    public function getErrors(){
        
            return $this->errors;
       
        
    }



    public function required($input, $inputName){

        if (empty($input)) {
            
            $this->$errors = "$inputName is required";
        }
    }






    public function image($error, $ext, $size){

        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        if ($error != 0) {
            $this->errors[] = "error while uploading image<br>";
        } elseif (!in_array($ext, $allowedExtensions)) {
            $this->errors[] = "exttension is not valid, extensions are jpg, jpeg, png and gif <br>";
        } elseif ($size > 2) {
            $this->errors[] = "max allowed size is 2 MB <br>";
        }
    }



}