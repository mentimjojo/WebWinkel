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

// Get user lang
if(isset($_GET['lang']) OR isset($_COOKIE['lang'])) {
    // Check if lang get is set
    if(isset($_GET['lang'])){
        // Set cookie
        setcookie('lang', $_GET['lang']);
        // Set lang
        $userlang = $_GET['lang'];
    } else if(isset($_COOKIE['lang'])) {
        // Else set lang
        $userlang = $_COOKIE['lang'];
    }
} else {
    $userlang = $config->language->default;
}
// Create language object
$lang = new Language($userlang);

// Set current language
$config->language->current = $userlang;

/**
 * Short function for getting a translated string gusing the language class
 * @param string $key
 */
function lang($key = '', $replace = array()) {
    global $lang;
    echo $lang->get($key, $replace);
}

$categories = new Categories();

// Create theme object
$theme = new Theme();

// Get theme
$theme->getTheme();
?>