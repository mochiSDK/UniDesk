<?php
require_once("dashboard.php");

$templateParams["categories"] = $db_helper->getCategories();
$templateParams["randomProducts"] = $db_helper->getRandomProducts(10);

require("templates/home.php")
?>
