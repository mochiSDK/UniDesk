<?php require_once("handlers/theme_handler.php"); ?>
<!doctype html>
<html lang="en" data-bs-theme="<?php echo $theme; ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $templateParams["title"]; ?></title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <link href="assets/product_style.css" rel="stylesheet">
</head>
<body>

<?php  
require_once('navbar_controller.php'); 
?>

<div class="container my-5">
    <div class="product-card p-4">
        <div class="row g-5">
            <div class="col-lg-5 text-center">
                <img src="<?php echo htmlspecialchars($templateParams['product']['Picture']); ?>" alt="<?php echo htmlspecialchars($templateParams['product']['Name']); ?>" class="product-image">
            </div>

            <div class="col-lg-7">
                <h1 class="product-title"><?php echo htmlspecialchars($templateParams['product']['Name']); ?></h1>
                <p class="product-price mb-2">€<?php echo number_format($templateParams['product']['Price'], 2, ',', '.'); ?></p>
                <p class="text-muted small mb-4">VAT Included</p>
                
                <ul class="details-list">
                    <li><strong>Brand:</strong> <?php echo htmlspecialchars($templateParams['product']['Brand']); ?></li>
                    
                    <?php 
                    if (!empty($templateParams['product']['Length']) || !empty($templateParams['product']['Height']) || !empty($templateParams['product']['Width'])): 
                    ?>
                    <li><strong>Size:</strong> 
                        <?php 
                        $dimensions = [];
                        if (!empty($templateParams['product']['Length'])) $dimensions[] = htmlspecialchars($templateParams['product']['Length']);
                        if (!empty($templateParams['product']['Width'])) $dimensions[] = htmlspecialchars($templateParams['product']['Width']);
                        if (!empty($templateParams['product']['Height'])) $dimensions[] = htmlspecialchars($templateParams['product']['Height']);
                        echo implode(' x ', $dimensions) . ' cm';
                        ?>
                    </li>
                    <?php endif; ?>
                    
                </ul>

                <div class="mt-4">
                    <p><?php echo nl2br(htmlspecialchars($templateParams['product']['Description'])); ?></p>
                </div>

                <form action="handlers/add_to_cart_handler.php" method="POST">
                    <input type="hidden" name="ProductId" value="<?php echo htmlspecialchars($templateParams['product']['ProductId']); ?>">
                    
                    <div class="d-grid gap-2 mt-4 action-buttons-container">
                                                
                        <?php if ($templateParams['product']['Amount'] > 0): ?>
                            <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-cart-plus"></i> Add to cart</button>
                        <?php else: ?>
                            <button type="button" class="btn btn-secondary btn-lg" disabled><i class="bi bi-x-circle"></i> Out of stock</button>
                        <?php endif; ?>
                        
                    </div>
                </form>
                
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
