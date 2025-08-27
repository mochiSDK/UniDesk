<?php
require_once("bootstrap.php");

$templateParams["ordersIdsDatesTotal"] = $db_helper->getIncomingOrdersIdsDatesTotal();

$orderDetails = [];
foreach ($templateParams["ordersIdsDatesTotal"] as $order) {
    $orderDetails[$order["OrderId"]] = $db_helper->getOrderDetails($order["OrderId"]);
}
$templateParams["orderDetails"] = $orderDetails;

require("templates/orders.php");
?>
