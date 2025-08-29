<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $templateParams["title"]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/cart_style.css" rel="stylesheet">
</head>
<body>

<?php require_once 'navbar_controller.php'; ?>

<div class="container my-5">
    <h1 class="mb-4">My cart</h1>
    <div class="row">
        <div class="col-lg-8">
            <div class="cart-items-container">
                <div class="cart-header d-none d-md-flex">
                    <div class="col-md-6">Product</div>
                    <div class="col-md-6 text-end">Price</div>
                </div>

                <?php if (empty($templateParams["cart_items"])): ?>
                    <p class="text-center p-4">Your cart is empty.</p>
                <?php else: ?>
                    <?php 
                    foreach ($templateParams["cart_items"] as $item): 
                        require 'cart_item.php'; 
                    endforeach; 
                    ?>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="summary-card">
                <h4>Summary</h4>
                <div class="summary-row">
                    <span>Total</span>
                    <span class="summary-total">€<?php echo number_format($templateParams["total_price"], 2, ',', '.'); ?></span>
                </div>
                <div class="d-grid">
                    <form action="handlers/checkout_handler.php" method="POST">
                        <button type="submit" class="btn btn-primary btn-lg w-100">Checkout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
