<?php
class Theme{

    // Get theme
    public function __construct(){
        // Get theme path
        require BASEDIR . '/' . THEME_PATH . '/index.php';
    }

    // Page system
    public function PageSystem($page){

    }

}
?>