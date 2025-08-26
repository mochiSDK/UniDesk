<?php
require_once("bootstrap.php");

$email = null;
if (isset($_SESSION["user_email"])) {
    $email = $_SESSION["user_email"];
}
$templateParams["productHistory"] = $db_helper->getCustomerOrderHistory($email);

require("templates/profile.php");
?>
