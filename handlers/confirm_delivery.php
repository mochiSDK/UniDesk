<?php
require_once("../bootstrap.php");

$orderId = $_GET["orderId"] ?? null;
$vendorEmails = $db_helper->getVendors();
if (isset($orderId) and isset($vendorEmails)) {
    $db_helper->confirmDelivery($orderId);
    foreach ($vendorEmails as $vendor) {
        $db_helper->addNotification($vendor["Email"], "The order $orderId has been delivered.");
    }
    header("Location: ../customer_profile.php");
    exit;
}
?>
