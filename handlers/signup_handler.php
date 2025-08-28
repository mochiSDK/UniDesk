<?php
session_start();
require_once '../db/database_helper.php';

$dbh = new DatabaseHelper("localhost", "root", "", "UniDeskDB");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // Date validation
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error_message'] = "Please, fill in all fields.";
        header("Location: ../signup_form.php");
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Invalid email format.";
        header("Location: ../signup_form.php");
        exit();
    }
    if (strlen($password) < 4) {
        $_SESSION['error_message'] = "Password must be at least 4 characters long.";
        header("Location: ../signup_form.php");
        exit();
    }
    if ($password !== $confirm_password) {
        $_SESSION['error_message'] = "Invalid Password.";
        header("Location: ../signup_form.php");
        exit();
    }

    if ($dbh->getUserByEmail($email)) {
        $_SESSION['error_message'] = "An account with this email already exists.";
        header("Location: ../signup_form.php");
        exit();
    }

    // New user registration
    if ($dbh->registerUser($username, $email, $password)) {
        $_SESSION['success_message'] = "Registration complete! You can now log in.";
        header("Location: ../signin_form.php");
        exit();
    } else {
            $_SESSION['error_message'] = "Oops! Something wrong. Try again later.";
            header("Location: ../signup_form.php");
            exit();
        }
}
?>
