<?php
require_once("../bootstrap.php");

if (!isset($_SESSION['user_email']) || empty($_SESSION['user_email'])) {
    // Se non è loggato, salva un messaggio di errore e reindirizza
    $_SESSION['error_message'] = "Devi essere loggato per aggiungere prodotti al carrello.";
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
        $_SESSION['success_message'] = "Prodotto aggiunto al carrello!";
    } else {
        $_SESSION['success_message'] = "Questo prodotto è già nel tuo carrello.";
    }
    
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
}

header("Location: ../index.php");
exit();
?>

