<?php
require_once("../bootstrap.php");

$orderId = $_GET["orderId"] ?? null;
$email  = $_GET["email"] ?? null;
if ($orderId and $email) {
    $db_helper->shipOrder($orderId);
    $db_helper->addNotification($email, "Your order $orderId has been shipped!");
    // Going back to order page.
    header("Location: ../incoming_orders.php");
    exit;
}
?>
