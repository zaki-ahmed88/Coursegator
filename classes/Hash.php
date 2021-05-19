<?php

namespace Coursegator\Classes;

class Hash
{


    public static function make($password){

        return password_hash($password, PASSWORD_DEFAULT);
    }


    public static function check($password, $hash){

        return password_verify($password, $hash);
    }

}