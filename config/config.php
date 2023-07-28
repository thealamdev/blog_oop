<?php

define('HOST','localhost');
define('USER','root');
define('PASSWORD','123');
define('DATABASE','xefy_blog');


$server = $_SERVER['SERVER_NAME'];
$full_uri = ($_SERVER['REQUEST_URI']);
$uri =  explode('/',$full_uri);
$base =  'http://'.$server.'/'.$uri[1].'/';

 
?>