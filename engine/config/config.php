<?php
// Array with all the config objects.
$config = (object) array(
    // Path objects
    'path' => (object) array(
        'basedir' => __DIR__ . '/../../',
        'basepath' => 'http://'.$_SERVER['SERVER_NAME'].substr($_SERVER["SCRIPT_NAME"], 0, -10),
        'theme' => 'theme'
    ),
    // Debug array
    'debug' => (object) array(
        'errors' => true,
        'database' => false
    ),
    // Database information
    'db' => (object) array (
        'user' => 'cylosi1q_webshop',
        'pass' => 'webshop',
        'host' => 'localhost',
        'name' => 'cylosi1q_webshop',
    ),
    // Theme system
    'theme' => (object) array(
        'path' => 'theme'
    )
);
?>