<?php
// Database class
class Database {

    // Private conn
    private $conn;

    /**
     * Construct the database connection
     */
    public function __construct(){
        // Get config
        global $config;
        // Make database connection
        try{
            // Set up the connection
            $this->conn = new PDO("mysql:host=".$config->db->host.";dbname=".$config->db->name.";", $config->db->user, $config->db->pass);
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
     * @return PDOStatement
     */
    public function query($query = '') {
        // Global config
        global $config;
        // Make sure it works
        try
        {
            // Prepare the query (remove injections)
            $query = $this->conn->prepare($query);
            // Run the prepared query
            $result = $this->conn->query($query);
            // Return the result
            return $result;
        }
        // Catch any errors
        catch (PDOException $ex) {
            // Check if debug is on
            if ($config->debug->errors) {
                // Die with the message
                die('Running query "' . $query . '" went wrong: ');
                var_dump($ex);
            } else {
                $config->debug->getErrors[] = 'Running query "' . $query . '" went wrong: ' . $ex->getMessage();
            }
        }
        // If not returned yet, return false
        return false;
    }

}

?>