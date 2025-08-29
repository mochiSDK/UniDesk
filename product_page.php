<?php
require_once("bootstrap.php");

if (!isset($_GET['ProductId']) || empty($_GET['ProductId'])) {
    die("ERROR: Product ID not specified.");
}
$product_id = $_GET['ProductId'];

$templateParams["title"] = "Dettaglio Prodotto - UniDesk";

$templateParams["product"] = $db_helper->getProductById($product_id);

if (!$templateParams["product"]) {
    die("ERROR: Product not found.");
}

$templateParams["title"] = $templateParams["product"]['Name'] . " - UniDesk";

require("templates/product_template.php");
?>
