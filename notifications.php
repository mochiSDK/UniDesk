<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("bootstrap.php");

if (!isset($_SESSION['user_email']) || empty($_SESSION['user_email'])) {
    header("Location: signin_form.php");
    exit;
}

$templateParams["title"] = "My Notifications";
$templateParams["notifications"] = $db_helper->getNotificationsByEmail($_SESSION['user_email']);

require("templates/notifications_template.php");
?>