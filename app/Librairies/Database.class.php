<?php

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASSWORD;
    private $dbName = DB_NAME;

    private $pdo;
    private $stmt;      // a verifier

    public function __construct()
    {
        $dsn = 'mysql:host='. $this->host . "; dbname=" . $this->dbName;
        try {
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
        }
        catch(PDOException $e){
            die("Echec de la connexion:" . $e->getMessage());
        }
    }
    
    public function __destruct()
    {
        if($this->stmt !== null){
            $this->stmt = null;
        }
        if($this->pdo !== null){
            $this->pdo = null;
        }
    } 

    
}