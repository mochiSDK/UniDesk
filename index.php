<?php
require_once("bootstrap.php");

$templateParams["categories"] = $db_helper->getCategories();
$templateParams["bestSellers"] = $db_helper->getBestSellers(5);
$templateParams["randomProducts"] = $db_helper->getRandomProducts(10);

require("templates/home.php");
?>
