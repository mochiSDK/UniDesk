<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Search - UniDesk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <?php require_once "navbar_controller.php"; ?>
    <div class="container mt-4">
        <?php foreach ($templateParams["products"] as $product): ?>
            <div class="row d-flex justify-content-center">
                <a href="product_page.php?ProductId=<?php echo $product["ProductId"]; ?>" class="card mb-3 w-100 text-decoration-none" style="max-width: 540px;">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <div class="position-relative">
                                <img src="<?php echo $product["Picture"] ?>" class="card-img-top border-bottom" style="max-height: 200px; object-fit: contain;" alt="...">
                                <span class="badge rounded-pill text-bg-primary position-absolute bottom-0 end-0 me-2 mb-2 fs-6">€<?php echo $product["Price"]; ?></span>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $product["Name"]; ?></h5>
                                <p class="card-text"><?php echo $product["Description"]; ?></p>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>
