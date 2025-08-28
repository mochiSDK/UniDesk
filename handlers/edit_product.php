<?php
require_once("../bootstrap.php");

$imgDir = "../images/products/";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productId = $_GET["productId"];
    $newName = $_POST["productName"];
    $newBrand = $_POST["productBrand"];
    $newModel = $_POST["productModel"];
    $newDescription = $_POST["productDescription"];
    $newPrice = $_POST["productPrice"];
    $newAmount = $_POST["productAmount"];
    $newCategoryId = $_POST["productCategory"];
    $newLength = $_POST["productLength"];
    $newHeight = $_POST["productHeight"];
    $newWidth = $_POST["productWidth"];

    $newImage = "";
    if (isset($_FILES["productImage"])) {
        $file = $_FILES["productImage"];
        $targetPath = $imgDir . basename($file["name"]);
        move_uploaded_file($file["tmp_name"], $targetPath);
        $newImage = $targetPath;
    }

    $db_helper->editProduct(
        $productId,
        $newName,
        $newBrand,
        $newModel,
        $newDescription,
        $newImage,
        $newPrice,
        $newAmount,
        $newCategoryId,
        $newLength,
        $newHeight,
        $newWidth
    );
    // Refreshing page.
    header("Location: ../inventory.php");
    exit;
}
?>
