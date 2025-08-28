<?php
require_once("bootstrap.php");

$templateParams["products"] = $db_helper->searchProduct($_GET["search"] ?? "");

require("templates/search_list.php");
?>
