<?php

class Session{
    public static function start(){
        session_start();
    }

    public static function set($key, $value){
        self::start();
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }else{
            return false;
        }
    }

    public static function authCheck(){
        self::start();
        if($_SESSION['login'] == true){
            header('location:index.php');
        } 
    }

    public static function sessionCheck(){
        self::start();
        if($_SESSION['login'] == false){
            self::destroy();
            header('location:login.php');
        }
    }

    public static function destroy(){
        session_destroy();
        header('location:login.php');
    }
}