<?php

require_once("bootstrap.php"); 

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: signin_form.php");
    exit();
}

$templateParams["title"] = "My Cart - UniDesk";
$templateParams["cart_items"] = [];
$templateParams["total_price"] = 0;

$customer_email = $_SESSION['user_email'];

$cart_id = $db_helper->getCartId($customer_email);

if ($cart_id) {
    $templateParams["cart_items"] = $db_helper->getCartItems($cart_id);
    // Calcola il totale
    foreach ($templateParams["cart_items"] as $item) {
        $templateParams["total_price"] += $item['Price'];
    }
}

require("templates/cart_template.php");
?>
