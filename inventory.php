<?php
require_once("bootstrap.php");

$templateParams["inventory"] = $db_helper->getInventory();
$templateParams["categories"] = $db_helper->getCategories();

require("templates/inventory_template.php");
?>
