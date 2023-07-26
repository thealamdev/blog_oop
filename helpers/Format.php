<?php


class Format{
    public static function validation($data){
        $data = trim($data);
        $data = stripslashes($data);
        return $data;
    }
}