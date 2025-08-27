<?php
session_start(); 
require_once 'includes/db_config.php';

// 1. ID product from URL
if (isset($_GET['ProductId']) && !empty($_GET['ProductId'])) {
    $product_id = $_GET['ProductId'];
} else {
    die("ERROR: ID product not found.");
}

// 2. query to get info
$sql = "SELECT * FROM PRODUCTS WHERE ProductId = ?";

if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("s", $product_id);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result->num_rows == 1) {
            $product = $result->fetch_assoc();
        } else {
            die("ERROR: Product not found.");
        }
    } else {
        echo "Oops! something wrong.";
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
    
    <!-- Stylesheet Link -->
    <link href="assets/product_style.css" rel="stylesheet">
</head>
<body>

<?php require_once "navbar_controller.php"; ?>

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
                    <li><strong>Size:</strong> <?php echo htmlspecialchars($product['Length']); ?> x <?php echo htmlspecialchars($product['Height']); ?> cm</li>
                </ul>

                <div class="mt-4">
                    <p><?php echo nl2br(htmlspecialchars($product['Description'])); ?></p>
                </div>

                <form action="handlers/add_to_cart_handler.php" method="POST">
                    <input type="hidden" name="ProductId" value="<?php echo htmlspecialchars($product['ProductId']); ?>">
                    <input type="hidden" name="quantity" value="1">

                    <!-- Buttons -->
                    <div class="d-grid gap-2 mt-4 action-buttons-container">
                        <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-cart-plus"></i> Add to cart</button>
                        <button type="button" class="btn btn-compare"><i class="bi bi-arrow-left-right"></i> Compare</button>
                    </div>
                </form>
                <!-- End of form -->

                <?php
                if (isset($_SESSION['success_message'])) {
                    echo '<div class="alert alert-success mt-3" role="alert">' . htmlspecialchars($_SESSION['success_message']) . '</div>';
                    unset($_SESSION['success_message']);
                }
                ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
