<?php

class MailVerify{
    
    public $token;
    public function mainVerify(){
        if(isset($_GET['token']))
        $this->token = $_GET['token'];
        echo $this->token;
    }

     
}


$ob = new MailVerify();
$ob->mainVerify();