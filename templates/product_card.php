<?php
/**
 * Template to display a single product card.
 */
?>
<div class="col">
    <a href="product_page.php?ProductId=<?php echo $product["ProductId"]; ?>" class="card h-100 text-decoration-none text-dark">
        <div class="img-container d-flex justify-content-center align-items-center" style="height: 200px;">
            <img src="<?php echo $product["Picture"] ?>" class="card-img-top" style="max-height: 100%; width: auto; object-fit: contain;" alt="<?php echo $product["Name"]; ?>">
        </div>
        <div class="card-body d-flex flex-column">
            <h5 class="card-title" style="height: 3rem; overflow: hidden;"><?php echo $product["Name"]; ?></h5>
            <p class="card-text small text-muted mt-auto"><?php echo substr($product["Description"], 0, 50); ?>...</p>
        </div>
        <span class="badge rounded-pill text-bg-primary position-absolute top-0 end-0 m-2 fs-6">€<?php echo $product["Price"]; ?></span>
    </a>
</div>


