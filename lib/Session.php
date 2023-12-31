<?php

class Session{
    public static function start(){
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    public static function set($key, $value){
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        self::start();
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }

    public static function authCheck(){
        self::start();
        if(isset($_SESSION['login']) && $_SESSION['login'] == true){
            header('location:'.$base.'Admin/index.php');
            exit; // Make sure to exit after the redirect
        } 
    }

    public static function sessionCheck(){
        self::start();
        if(!isset($_SESSION['login']) || $_SESSION['login'] == false){
            self::destroy();
            header('location:'.$base.'login.php');
            exit; // Make sure to exit after the redirect
        }
    }

    public static function destroy(){
        self::start();
            session_unset();
            session_destroy();
            header('http://localhost/blog/login.php');
    }
}

 