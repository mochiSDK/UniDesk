<?php
require_once("bootstrap.php");

if(!isset($_GET["id"])){
    header("Location: index.php");
    exit();
}

$categoryId = $_GET["id"];

$templateParams["category"] = $db_helper->getCategoryById($categoryId);
$templateParams["products"] = $db_helper->getProductsByCategoryId($categoryId);

if(!$templateParams["category"]){
    die("Category not found.");
}

$templateParams["title"] = $templateParams["category"]["Name"] . " - UniDesk";
require("templates/category_template.php");
?>
