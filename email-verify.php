<?php
require_once 'lib/Database.php';

$db = new Database();
session_start();

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $token_query = "SELECT remember_token FROM users WHERE remember_token = '$token'";
    $check_token = $db->select($token_query);

    if ($check_token !== true) {
        $status = "UPDATE users set status = '1' where remember_token = '$token'";
        $update_status = $db->update($status);

        if($update_status){
            header('location:'.$base . 'index.php');
        }
    } else {
        $_SESSION['error'] = 'Invalid Token';
        echo $_SESSION['error'];
    }
} else {
    echo "Token not provided.";
}
