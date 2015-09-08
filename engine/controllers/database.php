<?php
// Database class
class Database {

    // Private conn
    private $conn;

    /**
     * Construct the database connection
     */
    public function __construct(){
        global $config;
        try{
            // Set up the connection
            $this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";", DB_USER, DB_PASS);
            // Debug
            if($config->debug->database) {
                echo "There is a database connection. ";
            }
        } catch(PDOException $e){
            // Die if there is an error since the database is a main dependency
            die("There is no database connection " . $e->errorInfo);
        }
    }

    /**
     * Run a query on the database
     * @param string $query
     */
    public function query($query = '') {
        // Prepare the query (remove injections)
        $query = $this->conn->prepare($query);
        // Run the prepared query
        $result = $this->conn->query($query);

        // Return the result
        return $result;
    }

}

?>