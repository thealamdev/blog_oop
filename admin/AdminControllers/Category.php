<?php
include_file('Database.php', array(
    __DIR__ . '/lib'
));
include_file('Format.php', array(
    __DIR__ . '/helpers'
));

class Category
{
    public $db;
    public $fr;

    public function store($request)
    {
        $name = $this->fr->validation($request['category_name']);

        if(!empty($name)){
            // $insert_query = "INSERT INTO "
        }else{
            $error = "Enter a category";
        }
    }

    public function __construct()
    {
        $this->db = new Database();
        $this->fr = new Format();
    }
    
}
