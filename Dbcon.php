<?php
session_start();
class DbCon {
    public $conn;
    public function __construct() {
        $this->conn = new mysqli("localhost", "root", "", "CedHosting");
        if($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        return "connected successfully";
    }
}
?>