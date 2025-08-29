<?php
require_once("../bootstrap.php");

if (!isset($_SESSION['user_email']) || empty($_SESSION['user_email'])) {
    header("Location: ../signin_form.php");
    exit;
}

$customer_email = $_SESSION['user_email'];
$cart_id = $db_helper->getCartId($customer_email);

if ($cart_id) {
    $cart_items = $db_helper->getCartItems($cart_id);
    if (!empty($cart_items)) {
        $total_price = 0;
        foreach ($cart_items as $item) {
            $total_price += $item['Price'];
        }

        $newOrderId = $db_helper->createOrderFromCart($customer_email, $cart_id, $total_price);

        if ($newOrderId) {
            $_SESSION['success_message'] = "Your order #" . $newOrderId . " has been placed successfully!";

            // --- Send notification to vendors ---
            $vendors = $db_helper->getVendors();
            if ($vendors) {
                $notification_message = "You have received a new Order. " . $newOrderId;
                foreach ($vendors as $vendor) {
                    $db_helper->addNotification($vendor['Email'], $notification_message);
                }
            }

        } else {
            $_SESSION['error_message'] = "There was an error placing your order. Please try again.";
        }
    } else {
         $_SESSION['error_message'] = "Your cart is empty.";
    }
} else {
    $_SESSION['error_message'] = "Your cart is empty.";
}

header("Location: ../index.php");
exit;
?>

