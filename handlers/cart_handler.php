<?php
require_once("../bootstrap.php");

if (!isset($_SESSION['user_email']) || empty($_SESSION['user_email'])) {
    header("Location: ../signin_form.php");
    exit;
}

if (isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['ProductId'])) {
    
    $customer_email = $_SESSION['user_email'];
    $product_id_to_delete = $_POST['ProductId'];

    $cart_id = $db_helper->getCartId($customer_email);

    if ($cart_id) {
        $result = $db_helper->removeProductFromCart($cart_id, $product_id_to_delete);
        if ($result) {
            $_SESSION['success_message'] = "Product removed.";
        } else {
            $_SESSION['error_message'] = "Error.";
        }
    }
}

header("Location: ../cart.php");
exit;
?>
