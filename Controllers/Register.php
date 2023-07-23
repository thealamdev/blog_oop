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
          $remember_token = md5(rand());
          

          $mail_query = "SELECT * FROM users WHERE email = '$email'";
          $check_mail = $this->db->select($mail_query);

          

        if(empty($name) || empty($email) || empty($password)){
            $error = "Field must be fill up";
            return $error;
            header("location:login.php");
        }else{
            if($check_mail > 0){
                $error = "Email already Exists";
                return $error;
                header('location:login.php');
              }else{
                $insert_query = "INSERT INTO users(name,email,password,remember_token) values('$name','$email','$password','$remember_token')";

                $user_insert = $this->db->insert($insert_query);
                if($user_insert){
                    header('location:admin/index.php');
                }
              }
        }

          
         
    }

    public function __construct()
    {
        $this->db = new Database();
        $this->fr = new Format();
    }
}