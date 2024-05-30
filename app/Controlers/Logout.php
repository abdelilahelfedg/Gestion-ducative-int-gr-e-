<?php

class Logout
{
    public function index(){
        session_start();

        $_SESSION = array();

        session_destroy();
        Redirect("");
    }
}
