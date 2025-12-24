<?php

class Database
{
    private $host = "localhost";
    private $db_name = "user_system"; // تأكد من مطابقة هذا الاسم
    private $username = "root";
    private $password = "";
    private $charset = "utf8mb4";
    private $conn;
    private static $instance = null;

    private function __construct()
    {
        $dsn = "mysql:host=$this->host;dbname=$this->db_name;charset=$this->charset";
        try {
            $this->conn = new PDO($dsn, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Connection failed: " . $e->getMessage()); 
        }
    }

    public static function instance()
    {
        if (self::$instance == null) {
            self::$instance = new Database();
        }
        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }

    public function query($sql, $params = []) {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);
        return $stmt; 
    }
}

?>