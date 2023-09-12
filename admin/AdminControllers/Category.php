<?php
ob_start();
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

    public function __construct()
    {
        $this->db = new Database();
        $this->fr = new Format();
    }

    public function store($request)
    {
        $name = $this->fr->validation($request['category_name']);

        if (!empty($name)) {
            $insert_query = "INSERT INTO category(name) values('$name')";
            $insert = $this->db->insert($insert_query);
        } else {
            $error = "Enter a Category";
            return $error;
        }
    }

    public function show()
    {
        $categories_query = "SELECT * from category";
        $categories_result = $this->db->select($categories_query);
        if (isset($categories_result) && mysqli_num_rows($categories_result) > 0) {
            $categories = mysqli_fetch_all($categories_result, true);
            return $categories;
        } else {
            $error = "Data not found";
            return $error;
        }
    }

    // Category.php

    public function edit()
    {
        // Retrieve the 'id' parameter from the URL
        if (isset($_GET['id'])) {
            $id = base64_decode($_GET['id']);

            // Now, you can use the $id variable in your edit method
            // For example:
            echo "Editing category with ID: " . $id;

            // Rest of your edit logic here...
        } else {
            // Handle the case when 'id' is not present in the URL
            echo "ID parameter is missing!";
        }
    }
}
