<?php

$db = new Database();
if (isset($_GET['token'])) {
    $token = $_GET['token'];

    $token_query = "SELECT remember_token FROM users where remember_token = '$token'";
    $check_token = $db->select($token_query);

    if (mysqli_num_rows($check_token) > 0) {
    } else {
        $_SESSION['error'] = 'Invalid Token';
        echo $_SESSION['error'];
    }
}
