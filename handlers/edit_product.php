<?php
require_once("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $productId = $_GET["productId"];
    $newName = $_POST["productName"];
    $newBrand = $_POST["productBrand"];
    $newModel = $_POST["productModel"];
    $newDescription = $_POST["productDescription"];
    $newImage = $_POST["productImage"];
    $newPrice = $_POST["productPrice"];
    $newAmount = $_POST["productAmount"];
    $newCategoryId = $_POST["productCategory"];
    $newLength = $_POST["productLength"];
    $newHeight = $_POST["productHeight"];
    $newWidth = $_POST["productWidth"];

    // TODO: Implement image update.
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
