<?php
include_once('lib/Database.php');
include_once('helpers/Format.php');

require 'vendor/autoload.php';

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;



class Register
{
    public $db;
    public $fr;

    public function addUser($request)
    {

        function email_verification($name, $email, $remember_token)
        {

            $mail = new PHPMailer(true);

           
                //Server settings
                // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'shahalam141072@gmail.com';                     //SMTP username
                $mail->Password   = 'lunfaapcjmehokek';                               //SMTP password
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('shahalam141072@gmail.com', $name);
                $mail->addAddress($email);     //Add a recipient
                

                $emil_templete = "<a href='http://localhost/blog/Mail/MailVerify.php?token=$remember_token'>Click here</a>";
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Email Verification form Xefy';
                $mail->Body    =  $emil_templete;
                 

                $mail->send();
                
        }

        // Database::return(($request));
        $name = $this->fr->validation($request['name']);
        $email = $this->fr->validation($request['email']);
        $password = $this->fr->validation($request['password']);
        $remember_token = md5(rand());


        $mail_query = "SELECT * FROM users WHERE email = '$email'";
        $check_mail = $this->db->select($mail_query);



        if (empty($name) || empty($email) || empty($password)) {
            $error = "Field must be fill up";
            return $error;
            header("location:login.php");
        } else {
            if ($check_mail == true) {
                $error = "Email already Exists";
                return $error;
                header('location:login.php');
            } else {
                $insert_query = "INSERT INTO users(name,email,password,remember_token) values('$name','$email','$password','$remember_token')";

                $user_insert = $this->db->insert($insert_query);
                if ($user_insert) {
                    email_verification($name, $email, $remember_token);
                    $success = "Registration Successfully done. Check your email to verified account";
                    return $success;
                } else {
                    $error = "Registration failed";
                    return $error;
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