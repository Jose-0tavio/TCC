<?php

class Database{

    private $host = "localhost";
    private $db_name = "dbmusicart";
    private $username = "root";
    private $password = "root";
    public $pdo;
    
    function getConnection(){

        
        try {
        $this->pdo = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $exception){
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->pdo;
    }
    function closeConnection(){
        $this->pdo->close();
    }
}
?>