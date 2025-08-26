<?php
require_once("../bootstrap.php");

$orderId = $_GET["orderId"] ?? null;
if ($orderId) {
    $db_helper->shipOrder($orderId);
    // Going back to order page.
    header("Location: ../incoming_orders.php");
    exit;
}
?>
