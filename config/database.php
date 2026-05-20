<?php
class Database {
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $database = "wuwa_db";
    public $conn;

    public function __construct() {
        $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database);
        
        if ($this->conn->connect_error) {
            die("Koneksi database gagal: " . $this->conn->connect_error);
        }
        
        $this->conn->set_charset("utf8mb4");
    }
}

// Inisialisasi koneksi
$db = new Database();
$conn = $db->conn;
?>