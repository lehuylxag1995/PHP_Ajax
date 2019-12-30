<?php

class DB
{
    private $hostname = "localhost";
    private $dbname = "qlsv";
    private $username = "root";
    private $password = "";
    public $conn;
    function __construct()
    {
        try 
        {
            $this->conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbname."", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $e) 
        {
            echo "Error :" . $e->getMessage();
        }
    }
    
}

?>
