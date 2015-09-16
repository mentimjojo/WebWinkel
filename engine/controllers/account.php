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
     * Register a user
     * @email email from user
     * @password password from user
     * @password_r password repeat from user
     * @first_name First name from user
     * @insertion insertion from user
     * @last_name from user
     */
    public function registerUser($data = (object) array()){
        // Check if al field is empty

    }

    /**
     * Log in an user
     * @email email from user
     * @password from user
     */
    public function loginUser($email, $password){

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