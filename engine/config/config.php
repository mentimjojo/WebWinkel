<?php
// Array with all the config objects.
$config = (object) array(
    // Path objects
    'path' => (object) array(
        'basedir' => __DIR__ . '/../../',
        'basepath' => 'http://'.$_SERVER['SERVER_NAME'].substr($_SERVER["SCRIPT_NAME"], 0, -10)
    ),
    // Language
    'language' => (object) array(
        'default' => 'nl',
        'path' => 'languages'
    ),
    // Theme system
    'theme' => (object) array(
        'name' => 'Download',
        'path' => 'download',
        'url' => 'https://'.$_SERVER['SERVER_NAME'].substr($_SERVER["SCRIPT_NAME"], 0, -10).'/theme/download'
    ),
    // Debug array
    'debug' => (object) array(
        'errors' => true,
        'getErrors' => array(),
        'database' => false
    ),
    // Database information
    'db' => (object) array (
        'user' => 'cylosi1q_webshop',
        'pass' => 'webshop',
        'host' => 'localhost',
        'name' => 'cylosi1q_webshop',
        'prefix' => 'ws_'
    )
);

// Database tables
$config->db_tables = (object) array(
    'config' => $config->db->prefix . 'config',
    'category' => $config->db->prefix . 'categories',
    'subcategories' => $config->db->prefix . 'subcategories'
);
?>