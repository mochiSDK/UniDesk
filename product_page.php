<?php
require_once 'includes/db_config.php';

// 1. Get product ID from URL
if (isset($_GET['ProductId']) && !empty($_GET['ProductId'])) {
    $product_id = $_GET['ProductId'];
} else {
    die("ERRORE: ID del prodotto non specificato.");
}

// 2. Query to get Products info
$sql = "SELECT * FROM PRODUCTS WHERE ProductId = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $product_id);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $product = $result->fetch_assoc();
        } else {
            die("ERRORE: Prodotto non trovato.");
        }
    } else {
        echo "Oops! Qualcosa è andato storto.";
    }
    $stmt->close();
}
$conn->close();
?>

<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo htmlspecialchars($product['Name']); ?> - UniDesk</title>
    
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Stylesheet link -->
    <link href="assets/product_style.css" rel="stylesheet">
</head>
<body>

<?php 
require_once 'navbar.php'; 
?>

<div class="container my-5">
    <!-- Card Product Details -->
    <div class="product-card p-4">
        <div class="row g-5">
            <div class="col-lg-5 text-center">
                <img src="<?php echo htmlspecialchars($product['Picture']); ?>" alt="<?php echo htmlspecialchars($product['Name']); ?>" class="product-image">
            </div>

            <div class="col-lg-7">
                <h1 class="product-title"><?php echo htmlspecialchars($product['Name']); ?></h1>
                <p class="product-price mb-2">€<?php echo number_format($product['Price'], 2, ',', '.'); ?></p>
                <p class="text-muted small mb-4">IVA inclusa</p>
                
                <ul class="details-list">
                    <li><strong>Brand:</strong> <?php echo htmlspecialchars($product['Brand']); ?></li>
                    <li><strong>Dimensioni:</strong> <?php echo htmlspecialchars($product['Length']); ?>L x <?php echo htmlspecialchars($product['Width']); ?>W x <?php echo htmlspecialchars($product['Height']); ?>H cm</li>
                </ul>

                <div class="mt-4">
                    <p><?php echo nl2br(htmlspecialchars($product['Description'])); ?></p>
                </div>
                <div class="d-grid gap-2 mt-4 action-buttons-container">
                    <div class="input-group quantity-selector">
                        <button class="btn btn-outline-secondary" type="button">-</button>
                        <input type="text" class="form-control text-center" value="1">
                        <button class="btn btn-outline-secondary" type="button">+</button>
                    </div>
                    <button class="btn btn-primary btn-lg"><i class="bi bi-cart-plus"></i> Add to cart</button>
                    <button class="btn btn-wishlist"><i class="bi bi-heart"></i> Wishlist</button>
                    <button class="btn btn-compare"><i class="bi bi-arrow-left-right"></i> Compare</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
