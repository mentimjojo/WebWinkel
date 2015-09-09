<?php
// Require configuration
require_once __DIR__ . '/config/config.php';

// Enable debugging
if($config->debug->errors == true) {
    // Display errors
    ini_set('display_errors', 1);
    // Enable error reporting
    error_reporting(E_ALL);
} else {
    // Don't disable errors
    ini_set('display_errors', 0);
    // Disable error reporting
    error_reporting(0);
}

/**
 * Autoload function
 * @param $class
 * @return bool
 */
function autoload($class) {
    // Make path for classes
    $path = __DIR__ . '/controllers/' . strtolower($class) . '.php';
    // Check if file exists on path
    if(file_exists($path)) {
        // Include path/file
        require $path;
        // Return true if succes
        return true;
    } else {
        // Return false with error
        return false;
    }
}

// Register autoload function
spl_autoload_register('autoload');

// Creating database object
$database = new Database();

// Create theme object
$theme = new Theme();

// Create language object
$lang = new Language();

// Short for language
function __($key = '') {
    return $lang->get($key);
}

?>