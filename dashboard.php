<?php
session_start();
require_once("db/database_helper.php");
$db_helper = new DatabaseHelper("localhost", "root", "", "UniDeskDB");

// If user is not logged in, and is NOT already on signin page, redirect
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    if (basename($_SERVER['PHP_SELF']) !== "signin_form.php") {
        header("Location: signin_form.php");
        exit;
    }
}
// If user is logged in and tries to access signin page, redirect them away
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if (basename($_SERVER['PHP_SELF']) === "signin_form.php") {
        header("Location: index.php");
        exit;
    }
}
?>
