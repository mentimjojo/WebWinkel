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
    public function PageSystem($page){

    }

}
?>