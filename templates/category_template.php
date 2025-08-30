<?php require_once "handlers/theme_handler.php"; ?>
<!doctype html>
<html lang="en" data-bs-theme="<?php echo $theme; ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $templateParams["title"]; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php require_once 'navbar_controller.php'; ?>

<div class="container my-5">
    <h1 class="mb-4"><?php echo $templateParams["category"]["Name"]; ?></h1>

    <?php if(empty($templateParams["products"])): ?>
        <p>There are no products in this category yet.</p>
    <?php else: ?>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
            <?php 
            foreach ($templateParams["products"] as $product):
                require 'product_card.php';
            endforeach; 
            ?>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
