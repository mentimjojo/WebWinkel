<?php
class Theme{

    // Get theme
    public function __construct(){
        // Global config
        global $config;
        // Get theme path
        require $config->basedir . '/' . $config->theme->path . '/index.php';
    }

    // Page system
    public function PageSystem(){
        // Global config
        global $config;
        // Check if page exists
        if(empty($_GET['page'])){
            require $config->basedir . '/' . $config->theme->path . '/home.php';
        } else {
            // Make page
            $page = $_GET['page'].'.php';
            // Check if exits
            if (file_exists($config->basedir . '/' . $config->theme->path . '/' . $page)) {
                require $config->basedir . '/' . $config->theme->path . '/' . $page;
            } else {
                // Show errors when debug on
                echo "This page doesn't exists";
            }
        }
    }

}
?>