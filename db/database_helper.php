<?php
class DatabaseHelper {

    private $db;

    public function __construct($servername, $username, $password, $dbname) {
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getCategories() {
        $statement = $this->db->prepare("SELECT * FROM PRODUCT_CATEGORIES");
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getBestSellers() {
        return null;
    }

    public function getRandomProducts($amount = 5) {
        $statement = $this->db->prepare("SELECT Name, Price, Description, Picture FROM PRODUCTS ORDER BY RAND() LIMIT ?");
        $statement->bind_param("i", $amount);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    } 

}
