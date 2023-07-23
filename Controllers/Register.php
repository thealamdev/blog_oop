<?php
include_once('lib/Database.php');
include_once('helpers/Format.php');

 

class Register{
    public $db;
    public $fr;

    public function addUser($request){

        Database::return(($request));
          $name = $this->fr->validation($request['name']);
          $email = $this->fr->validation($request['email']);
          $password = $this->fr->validation($request['password']);
          
         
    }

    public function __construct()
    {
        $this->db = new Database();
        $this->fr = new Format();
    }
}