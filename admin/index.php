<?php
// Get config
require 'engine/config.php';

// Check if logged in
if(isset($_SESSION['login_key'])){
    require 'home.php';
} else {
    require 'pages/account/login.php';
}
?>