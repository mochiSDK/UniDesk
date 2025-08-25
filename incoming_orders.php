<?php
require_once("bootstrap.php");

$templateParams["orders"] = $db_helper->getIncomingOrders();

require("templates/orders.php");
?>
