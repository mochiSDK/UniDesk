<?php
require_once("bootstrap.php");

$templateParams["productHistory"] = $db_helper->getCustomerOrderHistory($_SESSION["user_email"]);

require("templates/profile.php");
?>
