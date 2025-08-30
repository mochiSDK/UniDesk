<?php
/**
 * template to show a single item in the cart
 */
?>
<div class="cart-item">
    <div class="row align-items-center">
        <div class="col-12 col-md-6">
            <div class="d-flex align-items-center">
                <img src="<?php echo htmlspecialchars($item['Picture']); ?>" alt="<?php echo htmlspecialchars($item['Name']); ?>" class="cart-item-image">
                <div>
                    <h5 class="item-name"><?php echo htmlspecialchars($item['Name']); ?></h5>
                    <p class="item-details">Item no: <?php echo htmlspecialchars($item['ProductId']); ?></p>
                    <div class="item-actions">
                        <form action="handlers/cart_handler.php" method="POST">
                            <input type="hidden" name="ProductId" value="<?php echo htmlspecialchars($item['ProductId']); ?>">
                            <button type="submit" name="action" value="delete" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 text-md-end mt-3 mt-md-0">
            <span class="item-price">€<?php echo number_format($item['Price'], 2, ',', '.'); ?></span>
        </div>
    </div>
</div>

