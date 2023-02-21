<?php

class Book
{
    private $db;

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

    // Select all books
    public function getBooks() {
        $stmt = $this->db->prepare("SELECT * FROM books");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Select detail for given id
    public function getBookById($id) {
        $stmt = $this->db->prepare("SELECT * FROM books WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


}