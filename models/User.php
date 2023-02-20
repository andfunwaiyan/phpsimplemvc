<?php

class User 
{

    // Make private to secure the connection var
    private $db;

    // First initial constructor function
    public function __construct()
    {
        $host = "localhost";
        $dbname = "test";
        $username = "root";
        $password = "";

        try {
            $this->db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    // Select all users
    public function getUsers() {
        $stmt = $this->db->prepare("SELECT * FROM users");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Select detail for given id
    public function getUserById($id) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}