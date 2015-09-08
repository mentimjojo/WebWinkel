<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/constants.php';

function __autoload($class) {
    $path = __DIR__ . 'controllers/' . strtolower($class) . '.php';
    if(file_exists($path)) {
        require $path;
        return true;
    } else {
        return false;
    }
}

$database = new Database();
