<?php
include_once('lib/Database.php');
include_once('helpers/Format.php');
include_once('lib/Session.php');

class Login
{
    private $db;
    private $se;

    public function Authlogin($request)
    {
        $email = Format::validation($request['email']);
        $password = Format::validation($request['password']);

        if (empty($email) || empty($password)) {
            $error = "Fields must be filled up";
            return $error;
        } else {
            $login_query = "SELECT name, email, password, status FROM users WHERE email = '$email' AND password = '$password'";
            $login_check = $this->db->select($login_query);

            if ($login_check && mysqli_num_rows($login_check) > 0) {
                $login_details = mysqli_fetch_assoc($login_check);
                if ($login_details['status'] == 0) {
                    $error = "Please Verify Your Email";
                    return $error;
                } else {
                    Session::set('login',true);
                    Session::set('name',$login_details['name']);
                    header('location:'.$base.'Admin/index.php');
                    exit; 
                }
            } else {
                $error = "Credentials are not matched";
                return $error;
            }
        }
    }

    public function __construct()
    {
        $this->db = new Database();
        $this->se = new Session();
    }
}
