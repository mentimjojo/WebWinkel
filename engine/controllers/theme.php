<?php
class Theme{

    /**
     * Initialize theme
     */
    public function __construct(){
        // Global config
        global $config;
        global $categories;
        global $theme;
    }

    public function getTheme(){
        // Global config
        global $config;
        global $categories;
        global $theme;
        // Requiere theme
        require $config->path->basedir . '/theme/' . $config->theme->path . '/index.php';
    }

    /**
     * Page system
     */
    public function PageSystem(){
        // Global config
        global $config;
        global $categories;
        global $theme;
        // Check if page exists
        if(empty($_GET['page'])){
            // Send to home
            echo '<script type="text/javascript">
                    window.location = "' . $config->path->basepath . '/home/"
                  </script>';
        } else {
            // Make page
            $page = $_GET['page'].'.php';
            // Check if exits
            if (file_exists($config->path->basedir . '/theme/' . $config->theme->path . '/pages/' . $page)) {
                require $config->path->basedir . '/theme/' . $config->theme->path . '/pages/' . $page;
            } else {
                if($config->debug->errors){
                    // Send error
                    echo "<center>This page doesn't exists.3</center>";
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