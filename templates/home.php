<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Home - UniDesk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <?php require_once "navbar.php"; ?>
    <div class="container text-start">
        <div class="row">
            <?php foreach($templateParams["categories"] as $category): ?>
            <div class="col">
                <div class="card mt-3 mb-3" style="max-width: 250px;">
                    <img src="..." class="card-img" style="max-height: 100px; object-fit: cover;" alt=" ...">
                    <div class="card-img-overlay bg-dark bg-opacity-50 d-flex align-items-end">
                        <h3 class="card-title fw-bold text-white"><?php echo $category["Name"]; ?></h3>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <h1>Best sellers</h1>
            <div class="col">
                <div class="card mb-3" style="max-width: 250px;">
                    <div class="position-relative">
                        <img src="images/pigmlin308.jpg" class="card-img-top border-bottom" style="max-height: 200px; object-fit: contain;" alt="...">
                        <span class="badge rounded-pill text-bg-primary position-absolute bottom-0 end-0 me-2 mb-2 fs-6">€2,99</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Product Name</h5>
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <h2>You might like</h2>
            <?php foreach($templateParams["randomProducts"] as $product): ?>
            <div class="col">
                <div class="card mb-3" style="max-width: 250px;">
                    <div class="position-relative">
                        <img src="<?php echo $product["Picture"] ?>" class="card-img-top border-bottom" style="max-height: 200px; object-fit: contain;" alt="...">
                        <span class="badge rounded-pill text-bg-primary position-absolute bottom-0 end-0 me-2 mb-2 fs-6">€<?php echo $product["Price"]; ?></span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product["Name"]; ?></h5>
                        <p class="card-text"><?php echo $product["Description"]; ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
