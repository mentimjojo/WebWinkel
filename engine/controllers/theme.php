<?php
class Theme{

    // Get theme
    public function __construct(){
        // Global config
        global $config;
        // Get theme path
        require $config->path->basedir . '/' . $config->path->theme . '/index.php';
    }

    // Page system
    public function PageSystem(){
        // Global config
        global $config;
        // Check if page exists
        if(empty($_GET['page'])){
            require $config->path->basedir . '/' . $config->path->theme . '/home.php';
        } else {
            // Make page
            $page = $_GET['page'].'.php';
            // Check if exits
            if (file_exists($config->path->basedir . '/' . $config->path->theme . '/' . $page)) {
                require $config->path->basedir . '/' . $config->path->theme . '/' . $page;
            } else {
                // Show errors when debug on
                echo "This page doesn't exists";
            }
        }
    }



}
?>