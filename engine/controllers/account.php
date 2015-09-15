<?php

// Account class
class Account{

    private $db;

    /**
     * Constructer for database
     */
    public function __construct(){
        // Global $database
        global $database;
        // Set Database
        $this->db = $database;
    }


    /**
     * Make password hash
     * @password password
     */
    public function makePasswordHash($password){
        // Hash password
        $hash = hash("sha512", $password);
        // Return hash
        return $hash;
    }

    /**
     * Make account hash with email & password
     * @email Email from user
     * @password Hashed password from user
     */
    public function makeUserHash($email, $password){
        // Hash password
        $hash = hash("sha512", $email.$password);
        // Return hash
        return $hash;
    }

}

?>