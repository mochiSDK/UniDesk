<?php
session_start();

require_once '../db/database_helper.php';

$dbh = new DatabaseHelper("localhost", "root", "", "UniDeskDB");

// check if the user is logged in
if (!isset($_SESSION['user_email'])) {
    // If the user is not logged in, save an error message and redirect to the sign-in page.
    $_SESSION['error_message'] = "You must be logged in to add products to the cart.";
    header("Location: ../signin_form.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['ProductId'])) {
    
    $customer_email = $_SESSION['user_email'];
    $product_id = $_POST['ProductId'];
    
    // find or create a cart for the user
    $cart_id = $dbh->getCartId($customer_email);
    if (!$cart_id) {
        // If the user doesn't have a cart, create a new one
        $cart_id = $dbh->createCart($customer_email);
    }

    // add the product to the cart if it's not already there
    if ($cart_id && !$dbh->isProductInCart($cart_id, $product_id)) {
        $dbh->addProductToCart($cart_id, $product_id);
    }
    
    // redirect back to the previous page with a success message
    $_SESSION['success_message'] = "Product added to cart!";
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

// If someone tries to access this file directly or without the correct data, redirect to the homepage.
header("Location: ../index.php");
exit();
?>
