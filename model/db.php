<?php
class DB {
    private $dsn = 'mysql:dbname=mproject;host=localhost';
    private $user = 'root';
    private $password = 'root';
    protected $conn;
    public function __construct(){        
        try {
            $this->conn = new PDO($this->dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
        
    }
    

}