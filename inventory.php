<?php
require_once("bootstrap.php");

$templateParams["inventory"] = $db_helper->getInventory();

require("templates/inventory_template.php");
?>
