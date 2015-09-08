<?php
// Class connection
class Connection{

    private $conn;

    public function ConnectDB(){
        try{
            $this->conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME.";", DB_USER, DB_PASS);
        } catch(PDOException $e){
            die("There is no database connection " . $e->errorInfo);
        }
    }
}
?>