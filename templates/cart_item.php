<?php
/**
 * Template to display a single item in the shopping cart.
 */
?>
<div class="cart-item">
    <div class="row align-items-center">
        <!-- Immagine e Dettagli Prodotto -->
        <div class="col-12 col-md-6">
            <div class="d-flex align-items-center">
                <img src="<?php echo htmlspecialchars($item['Picture']); ?>" alt="<?php echo htmlspecialchars($item['Name']); ?>" class="cart-item-image">
                <div>
                    <h5 class="item-name"><?php echo htmlspecialchars($item['Name']); ?></h5>
                    <p class="item-details">Item no: <?php echo htmlspecialchars($item['ProductId']); ?></p>
                    <p class="item-details">Quantity: 1</p>
                    <div class="item-actions">
                        <button class="btn btn-sm btn-outline-secondary">Edit</button>
                        <button class="btn btn-sm btn-outline-danger">Delete</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Prezzo -->
        <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0">
            <span class="item-price">€<?php echo number_format($item['Price'], 2, ',', '.'); ?></span>
        </div>
    </div>
</div>
