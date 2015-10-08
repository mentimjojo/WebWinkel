<?php
// Require configuration
require_once __DIR__ . '/config/config.php';

// Start session
session_start();

// Start ob so we dont get header already send
ob_start();

// Check if session is isset
if (!isset($_SESSION['login_status'])) {
    // Set session
    $_SESSION['login_status'] = 0;
}

// Enable debugging
if ($config->debug->errors == true) {
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
function autoload($class)
{
    // Make path for classes
    $path = __DIR__ . '/controllers/' . strtolower($class) . '.php';
    // Check if file exists on path
    if (file_exists($path)) {
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

if(isset($_GET['lang'])) {
    setcookie('lang', $_GET['lang']);

    $userlang = $_GET['lang'];

    echo $userlang;
} elseif(isset($_COOKIE['lang'])) {

    $userlang = $_COOKIE['lang'];
    
    echo $userlang;
} elseif(!isset($_COOKIE['lang'])) {
    setcookie('lang', $config->language->default);

    $userlang = $config->language->default;
}

echo $_COOKIE['lang'];
echo $userlang;
// Create language object
$lang = new Language($userlang);

// Set current language
$config->language->current = $userlang;

/**
 * Short function for getting a translated string gusing the language class
 * @param string $key
 */
function lang($key = '', $replace = array())
{
    global $lang;
    echo $lang->get($key, $replace);
}

// Register categories
$categories = new Categories();

// Register mailer class
$mailer = new Mailer();

// Register account
$account = new Account();

// Check if user want to logout
if (!isset($_GET['logout'])) {
    // Set logout if is nothing
    $_GET['logout'] = '';
    // Set session nothing
    if ($_SESSION['login_status'] == 0) {
        // Set hash nothing
        $_SESSION['login_hash'] = '';
    }
} else if ($_GET['logout'] == 1) {
    // Logoout user
    $account->logoutUser($_SESSION['login_hash']);
    // Send to home page
    header('location: ' . $config->path->basepath . '/home/');
}

// Check when user last was online
if(!isset($_SESSION['login_activity'])){
    // If not set, start
    $_SESSION['login_activity'] = '';
    // Check if 30 min offline
} else if(isset($_SESSION['login_activity']) && (time() - $_SESSION['login_activity'] > 1800)){
    //Destroy session
    session_destroy();
}

// Set activity when logged in
if($_SESSION['login_status'] == 1){
    // Set time
    $_SESSION['login_activity'] = time();
}


// Create theme object
$theme = new Theme();

// Get theme
$theme->getTheme();

?>