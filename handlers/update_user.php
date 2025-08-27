<?php
require_once("../bootstrap.php");

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newUsername = $_POST["username"];
    $newPassword = $_POST["password"];
    $email = $_SESSION["user_email"] ?? null;

    if (!$email) {
        die("Could not update credentials.");
    }
    $db_helper->updateUserCredentials($newUsername, $newPassword, $email);
    $_SESSION["username"] = $newUsername;
    // Refreshing page.
    header("Location: ../customer_profile.php");
    exit;
}
?>
