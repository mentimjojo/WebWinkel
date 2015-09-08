<?php
// Array with all the config objects.
$config = (object) array(
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