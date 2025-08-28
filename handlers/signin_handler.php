<?php
session_start();
require_once '../db/database_helper.php';

$dbh = new DatabaseHelper("localhost", "root", "", "UniDeskDB");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Please, Insert email and password.";
        header("Location: ../signin_form.php");
        exit();
    }
    
    $user = $dbh->getUserByEmail($email);

    if ($user && $password === $user['Password']) { 
        $_SESSION['loggedin'] = true;
        $_SESSION['user_email'] = $user['Email'];
        $_SESSION['username'] = $user['Username'];
        header("Location: ../index.php");
        exit();
    } else {
        $_SESSION['error_message'] = "Invalid credentials.";
        header("Location: ../signin_form.php");
        exit();
    }
}
?>
    

 