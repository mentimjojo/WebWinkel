<?php
// Require configuration
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/constants.php';

// Enable debugging
if($config->debug == true) {
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
} else {
    ini_set('display_errors', 0);
    error_reporting(0);
}

/**
 * Autoload function
 * @param $class
 * @return bool
 */
function autoload($class) {
    $path = __DIR__ . '/controllers/' . strtolower($class) . '.php';
    if(file_exists($path)) {
        require $path;
        return true;
    } else {
        return false;
    }
}

// Register autoload function
spl_autoload_register('autoload');

// Creating database object
$database = new Database();
