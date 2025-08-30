<?php
require_once("../bootstrap.php");

if (!isset($_SESSION['user_email']) || empty($_SESSION['user_email'])) {
    $_SESSION['error_message'] = "Sign In to add products to cart.";
    header("Location: ../signin_form.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ProductId'])) {
    
    $customer_email = $_SESSION['user_email'];
    $product_id = $_POST['ProductId'];
    
    $cart_id = $db_helper->getCartId($customer_email);
    if (!$cart_id) {
        $cart_id = $db_helper->createCart($customer_email);
    }

    if ($cart_id && !$db_helper->isProductInCart($cart_id, $product_id)) {
        $db_helper->addProductToCart($cart_id, $product_id);
        $_SESSION['success_message'] = "Product added to cart!";
    } else {
        $_SESSION['success_message'] = "This product is already in the cart.";
    }
    
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

header("Location: ../index.php");
exit();
?>

