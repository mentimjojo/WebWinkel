<?php
class Theme{

    /**
     * Initialize theme
     */
    public function __construct(){
        // Global config
        global $config;
        // Load theme
        require $config->path->basedir . '/theme/' . $config->theme->path . '/index.php';
    }

    /**
     * Page system
     */
    public function PageSystem(){
        // Global config
        global $config;
        // Check if page exists
        if(empty($_GET['page'])){
            // Require home page
            require $config->path->basedir . '/theme/' . $config->theme->path . '/home.php';
        } else {
            // Make page
            $page = $_GET['page'].'.php';
            // Check if exits
            if (file_exists($config->path->basedir . '/theme/' . $config->theme->path . '/' . $page)) {
                require $config->path->basedir . '/theme/' . $config->theme->path . '/' . $page;
            } else {
                if($config->debug->errors){
                    // Show all errors
                    $config->debug->getErrors[] = "An page error with the following information: " . $page;
                } else {
                    // Show errors when debug on
                    $config->debug->getErrors[] = "This page doesn't exists";
                }
            }
        }
    }



}
?>