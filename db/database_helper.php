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
        $query = "SELECT o.OrderId, p.Picture, p.Name, p.Brand, p.Price, o.PurchaseDate, o.DeliveryDate, o.Status
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
                c.CategoryId,
                p.Name,
                p.Brand,
                p.Description,
                m.Name AS Model,
                c.Name AS Category,
                p.Picture,
                Price,
                Amount,
                Length,
                Height,
                Width
            FROM PRODUCTS p
            JOIN PRODUCT_CATEGORIES c ON p.CategoryId = c.CategoryId
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

    public function updateUserCredentials($newUsername, $newPassword, $email) {
        if ($newUsername == "" or $newPassword == "" or $email == "") {
            die("Credentials update aborted.");
        }
        $statement = $this->db->prepare("UPDATE CUSTOMERS SET Username = ?, Password = ? WHERE Email = ?");
        $statement->bind_param("sss", $newUsername, $newPassword, $email);
        $statement->execute();
        return $statement->affected_rows == 1;
    }

    public function shipOrder($orderId) {
        // TODO: handle cart correctly too.
        $statement = $this->db->prepare("UPDATE ONLINE_ORDERS SET Status = 'Shipped' WHERE OrderId = ?");
        $statement->bind_param("s", $orderId);
        return $statement->execute();
    }

    public function editProduct(
        $productId,
        $newName,
        $newBrand,
        $newModel,
        $newDescription,
        $newImage,
        $newPrice,
        $newAmount,
        $newCategoryId,
        $newLength,
        $newHeight,
        $newWidth
    ) {
        $query = "UPDATE PRODUCTS
            SET Name = ?, 
                Brand = ?, 
                Description = ?, 
                Picture = ?, 
                Price = ?, 
                Amount = ?, 
                CategoryId = ?, 
                Length = ?, 
                Height = ?, 
                Width = ?
            WHERE ProductId = ?";
        $statement = $this->db->prepare($query);
        $statement->bind_param(
            "ssssdissdds",
            $newName,
            $newBrand,
            $newDescription,
            $newImage,
            $newPrice,
            $newAmount,
            $newCategoryId,
            $newLength,
            $newHeight,
            $newWidth,
            $productId
        );
        $res1 = $statement->execute();

        // Update or insert model.
        $queryModel = "INSERT INTO PRODUCT_MODELS (Name, ProductId)
                VALUES (?, ?)
                ON DUPLICATE KEY UPDATE Name = VALUES(Name)";

        $statementModel = $this->db->prepare($queryModel);
        $statementModel->bind_param("ss", $newModel, $productId);
        $res2 = $statementModel->execute();
        return $res1 and $res2;
    }
}
