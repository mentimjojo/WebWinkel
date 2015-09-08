<?php
// Database class
class Database {

    // Private conn
    private $conn;

    /**
     * Construct the database connection
     */
    public function __construct(){
        try{
            // Set up the connection
            $this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";", DB_USER, DB_PASS);
            // Debug
            if(DEBUG) {
                echo "There is a database connection. ";
            }
        } catch(PDOException $e){
            // Die if there is an error since the database is a main dependency
            die("There is no database connection " . $e->errorInfo);
        }
    }
}

?>