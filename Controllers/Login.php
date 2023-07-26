<?php
include_once('lib/Database.php');
include_once('helpers/Format.php');
include_once('lib/Session.php');
// Session::start();
class Login
{
    public $db;
    public $se;

    public function Authlogin($request)
    {

        Database::return($request);

        $email = Format::validation($request['email']);
        $password = Format::validation(($request['password']));

        $login_query = "SELECT id,name,email,password FROM users WHERE email = '$email' AND password = '$password'";
        $login_check = $this->db->select($login_query);
        $login_details = mysqli_fetch_assoc($login_check);
        if($login_check == true){
            return "fne";
            // Database::return($login_details);
             Session::set('login',$login_details['id']);
            // Session::set('name',$login_details['name']);
            // Session::set('email',$login_details['email']);

        }else{
            return "Your info is not correct";
        }
    }

    public function __construct()
    {
        $this->db = new Database();
        $this->se = new Session();
    }
}