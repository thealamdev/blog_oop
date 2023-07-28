<?php
$server = $_SERVER['SERVER_NAME'];
$full_uri = ($_SERVER['REQUEST_URI']);
$uri =  explode('/',$full_uri);
$base =  'http://'.$server.'/'.$uri[1].'/';

function include_file($filename, $searchDirectories = array()) {
    // Define the root directory path
    $root_path = __DIR__; // Use __DIR__ for PHP 5.3+ or define it manually for older versions

    // Define the default directories where files might be located
    $defaultDirectories = array(
        $root_path,                       // Root directory
        $root_path . '/lib',              // lib folder
        $root_path . '/config',           // config folder
        $root_path . '/component',        // component folder
        $root_path . '/Controllers',      // Controllers folder
        $root_path . '/helpers',  
        $root_path . '/admin',
        $root_path . '/admin/category',  
        $root_path . '/admin/components',
        $root_path . '/admin/AdminControllers'
    );

    // Merge the custom search directories first and then the default directories
    $directories = array_merge($searchDirectories, $defaultDirectories);

    // Search for the file in the specified directories (prioritize innermost directories first)
    for ($i = count($directories) - 1; $i >= 0; $i--) {
        $file_path = $directories[$i] . '/' . $filename;
        if (file_exists($file_path)) {
            include_once $file_path;
            return;
        }
    }

    // If the file is not found in any directory, throw an error
    trigger_error("File '$filename' not found.", E_USER_ERROR);
}



?>