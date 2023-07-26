<?php
require_once 'lib/Database.php';

$db = new Database();
session_start();

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $token_query = "SELECT remember_token,status FROM users WHERE remember_token = '$token' AND status = '0'";
    $check_token = $db->select($token_query);
    

    if ($check_token == true) {
        $status = "UPDATE users set status = '1' where remember_token = '$token'";
        $update_status = $db->update($status);

        if($update_status){
            $_SESSION['success'] = 'Email Verified. Please Login';
            header('location:'.$base . 'login.php');
        } 
    } else {
        $_SESSION['error'] = 'Invalid Token or Token already used';
        header('location:'.$base . 'login.php');
    }
} else {
    $_SESSION['error'] = 'Token is not provided';
}