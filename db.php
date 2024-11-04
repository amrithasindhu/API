<?php
class Database
{
    private string $username = 'root';
    private string $host = 'localhost';
    private string $pwd = '';
    private string $dbName = 'myblog';
    private $conn;
    protected function connect(): PDO | string
    {
        try {
            $conn = "mysql:host=$this->host; dbname=$this->dbName";
            $pdo = new PDO($conn, $this->username, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOEXception $e) {
            return "Connection Failed" . $e->getMessage();
        }
    }
}