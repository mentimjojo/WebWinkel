<?php

// Account class
class Account{

    private $db;
    private $config;
    private $mailer;

    /**
     * Constructer for database
     */
    public function __construct(){
        // Global $database
        global $database;
        global $config;
        global $mailer;
        // Set config
        $this->config = $config;
        // Set Database
        $this->db = $database;
        // Set mailer
        $this->mailer = $mailer;
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
    public function registerUser($data = array()){
        // Global lang
        global $lang;
        // Make object
        $data = (object) $data;
        // Check if email exists in database
        $check_query = "SELECT email FROM  " . $this->config->db_tables->account . " WHERE email = '$data->email'";
        // Prepare connection
        $result = $this->db->query($check_query);
        $result = $result->rowCount();
        // Check if email exists
        if($result >= 1){
            // Return
            return 0;
        } else {
            // Make password hash
            $pass_hash = $this->makePasswordHash($data->password);
            // Make user hash
            $user_hash = $this->makeUserHash($data->email, $data->password);
            //Prepare query
            $query = 'INSERT INTO ' . $this->config->db_tables->account . ' ';
            $query .= '(hash, email, password, first_name, insertion, last_name, gender) ';
            $query .= "VALUES ('$user_hash', '$data->email', '$pass_hash', '$data->first_name', '$data->insertion', '$data->last_name', '$data->gender')";
            // Run query
            $result = $this->db->query($query);
            // Send email
            $this->mailer->setFrom("contact@pc4u.ml");
            $this->mailer->setReply("contact", "contact@pc4u.ml");
            $this->mailer->setSubject($lang->get('register.emails.subject'));
            $this->mailer->setReceiver($data->email);
            $this->mailer->setMessage(true, $lang->get('register.emails.msg', array('name' => $data->first_name)));

            $this->mailer->sendMail();
            // Start session
            $_SESSION['login_status'] = 1;
            // set hash in session
            $_SESSION['login_hash'] = $user_hash;
            // Return 1
            return 1;
        }
    }

    /**
     * Log in an user
     * @email email from user
     * @password from user
     */
    public function loginUser($email, $password){

    }

    /**
     * Password forget
     * @Email email from user
     */
    public function forgotPassword($email){

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
        // Make user hash
        $hash = hash("sha512", $email.$password);
        // Return hash
        return $hash;
    }
}

?>