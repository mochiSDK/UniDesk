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

    public function getBestSellers($amount = 5) {
        $query = "SELECT
                p.ProductId,
                p.Name,
                p.Price,
                p.Description,
                p.Picture,
                COUNT(*) AS SoldAmount
            FROM includes i
            JOIN PRODUCTS p on i.ProductId = p.ProductId
            GROUP BY p.ProductId
            ORDER BY SoldAmount DESC
            LIMIT ?
        ";
        $statement = $this->db->prepare($query);
        $statement->bind_param("i", $amount);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getRandomProducts($amount = 5) {
        $statement = $this->db->prepare("SELECT Name, Price, Description, Picture FROM PRODUCTS ORDER BY RAND() LIMIT ?");
        $statement->bind_param("i", $amount);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function isVendor($email) {
        if ($email == "" or $email == null) {
            die("The provided email is empty or null.");
        }
        $statement = $this->db->prepare("SELECT IsVendor FROM CUSTOMERS WHERE Email = ?");
        $statement->bind_param("s", $email);
        $statement->execute();
        $result = $statement->get_result()->fetch_assoc();
        return $result ? (bool)$result["IsVendor"] : false;
    }

    public function getCustomerOrderHistory($email) {
        if ($email == "" or $email == null) {
            die("The provided email is empty or null.");
        }
        $query = "SELECT p.Picture, p.Name
            FROM ONLINE_ORDERS o
            JOIN includes i ON o.OrderId = i.OrderId
            JOIN PRODUCTS p ON i.ProductId = p.ProductId
            WHERE o.Email = ?
            ORDER BY o.PurchaseDate DESC
        ";
        $statement = $this->db->prepare($query);
        $statement->bind_param("s", $email);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getInventory() {
        $query = "SELECT
                p.ProductId,
                p.Name,
                m.Name AS Model,
                Picture,
                Price,
                Amount
            FROM PRODUCTS p
            LEFT JOIN PRODUCT_MODELS m ON p.ProductId = m.ProductId
            ORDER BY p.Name
        ";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getIncomingOrdersIdsDatesTotal() {
        $query = "SELECT DISTINCT o.OrderId, o.PurchaseDate, o.DeliveryDate, o.Total
            FROM includes i
            LEFT JOIN ONLINE_ORDERS o ON o.OrderId = i.OrderId
            WHERE Status = 'Pending'
        ";
        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getOrderDetails($id) {
        $query = "SELECT Name, Brand, Price
            FROM PRODUCTS p
            JOIN includes i ON p.ProductId = i.ProductId
            JOIN ONLINE_ORDERS o ON o.OrderId = i.OrderId
            WHERE o.Status = 'Pending'
            AND o.OrderId = ?
        ";
        $statement = $this->db->prepare($query);
        $statement->bind_param("s", $id);
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

}
