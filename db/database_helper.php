<?php
class DatabaseHelper {

    private $db;

    public function __construct($servername, $username, $password, $dbname) {
        $this->db = new mysqli($servername, $username, $password, $dbname);
        if ($this->db->connect_error) {
            die("Connection failed: " . $this->db->connect_error);
        }
    }

    public function getUserByEmail($email) {
        $stmt = $this->db->prepare("SELECT * FROM CUSTOMERS WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function registerUser($username, $email, $password) {
        // Nota: qui non c'è hashing, come da tua richiesta precedente.
        $stmt = $this->db->prepare("INSERT INTO CUSTOMERS (Username, Email, Password, IsVendor) VALUES (?, ?, ?, 0)");
        $stmt->bind_param("sss", $username, $email, $password);
        return $stmt->execute();
    }

    public function getProductById($productId) {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCTS WHERE ProductId = ?");
        $stmt->bind_param("s", $productId);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc(); // Restituisce un solo prodotto o null
    }

    public function getCartItems($cartId) {
        $stmt = $this->db->prepare("SELECT p.* FROM contains c JOIN PRODUCTS p ON c.ProductId = p.ProductId WHERE c.CartId = ?");
        $stmt->bind_param("s", $cartId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
    }


    public function getCartId($email) {
        $stmt = $this->db->prepare("SELECT CartId FROM CARTS WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result ? $result['CartId'] : null;
    }


    public function createCart($email) {
        $cart_id = uniqid('cart_', true);
        $stmt = $this->db->prepare("INSERT INTO CARTS (CartId, Email) VALUES (?, ?)");
        $stmt->bind_param("ss", $cart_id, $email);
        if ($stmt->execute()) {
            return $cart_id;
        }
        return null;
    }


    public function isProductInCart($cartId, $productId) {
        $stmt = $this->db->prepare("SELECT ProductId FROM contains WHERE CartId = ? AND ProductId = ?");
        $stmt->bind_param("ss", $cartId, $productId);
        $stmt->execute();
        return $stmt->get_result()->num_rows > 0;
    }


    public function addProductToCart($cartId, $productId) {
        $stmt = $this->db->prepare("INSERT INTO contains (CartId, ProductId) VALUES (?, ?)");
        $stmt->bind_param("ss", $cartId, $productId);
        return $stmt->execute();
    }

    public function getCategories() {
        $statement = $this->db->prepare("SELECT * FROM PRODUCT_CATEGORIES");
        $statement->execute();
        return $statement->get_result()->fetch_all(MYSQLI_ASSOC);
    }

    public function getCategoryById($categoryId) {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCT_CATEGORIES WHERE CategoryId = ?");
        $stmt->bind_param("s", $categoryId);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function getProductsByCategoryId($categoryId) {
        $stmt = $this->db->prepare("SELECT * FROM PRODUCTS WHERE CategoryId = ?");
        $stmt->bind_param("s", $categoryId);
        $stmt->execute();
        return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
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
        $statement = $this->db->prepare("SELECT Name, Price, Description, Picture, ProductId FROM PRODUCTS ORDER BY RAND() LIMIT ?");
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

    public function getInventory($search = "") {
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
        ";
        if (!empty($search)) {
            $query .= " WHERE p.Name LIKE ?";
        }
        $query .= " ORDER BY p.Name";
        $statement = $this->db->prepare($query);
        if (!empty($search)) {
            $param = "%" . $search . "%";
            $statement->bind_param("s", $param);
        }
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

    public function addProduct(
        $name,
        $brand,
        $model,
        $description,
        $image,
        $price,
        $amount,
        $categoryId,
        $length,
        $height,
        $width
    ) {
        $query = "INSERT INTO PRODUCTS (ProductId, CategoryId, Name, Brand, Price, Amount, Description, Length, Height, Width, Picture) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        ";
        $statement = $this->db->prepare($query);
        $productId = uniqid("P-");
        $params = [
            $productId,
            $categoryId,
            $name,
            $brand,
            $price,
            $amount,
            empty($description) ? null : $description,
            empty($length) ? null : $length,
            empty($height) ? null : $height,
            empty($width) ? null : $width,
            empty($image) ? null : $image
        ];
        $statement->bind_param("ssssdisddds", ...$params);
        $res = $statement->execute();

        if (!empty($model)) {
            $statementModel = $this->db->prepare("INSERT INTO PRODUCT_MODELS (Name, ProductId) VALUES (?, ?)");
            $statementModel->bind_param("ss", $model, $productId);
            $res = $res and $statementModel->execute();
        }
        return $res;
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
                Price = ?, 
                Amount = ?, 
                CategoryId = ?, 
                Length = ?, 
                Height = ?, 
                Width = ?
        ";
        $params = [
            $newName,
            $newBrand,
            $newDescription,
            $newPrice,
            $newAmount,
            $newCategoryId,
            $newLength,
            $newHeight,
            $newWidth
        ];
        $types = "sssdisddd";

        // Adding image if provided.
        if (!empty($newImage)) {
            $query .= ", Picture = ?";
            $params[] = $newImage;
            $types .= "s";
        }

        $query .= " WHERE ProductId = ?";
        $params[] = $productId;
        $types .= "s";

        $statement = $this->db->prepare($query);
        $statement->bind_param($types, ...$params);
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
