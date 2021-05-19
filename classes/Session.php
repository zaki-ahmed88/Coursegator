<?php

namespace Coursegator\Classes;

class Session
{

    //we want to start session once object of session created, so we will use _construct()

    public function __construct()
    {
        session_start();
    }


    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }


    public function get($key)
    {
        return $_SESSION[$key];
    }


    public function has($key)
    {
        return isset($_SESSION[$key]);
    }


    public function remove($key)
    {
        unset($_SESSION[$key]);
    }

    public function destroy()
    {
        session_destroy();
    }
}
