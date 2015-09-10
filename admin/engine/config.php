<?php
// Start session
session_start();

// Config
$config = (object) array(
    'path' => (object) array(
        'url' => 'http://'.$_SERVER['SERVER_NAME'].substr($_SERVER["SCRIPT_NAME"], 0, -10)
    )
);
?>