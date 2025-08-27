<?php

$email = null;
if (isset($_SESSION["user_email"])) {
    $email = $_SESSION["user_email"];
}
$templateParams["userType"] = $db_helper->isVendor($email);

require("templates/navbar.php");
?>
