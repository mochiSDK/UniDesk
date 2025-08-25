<?php
/*
 * signin_handler.php
 * Gestisce la logica di accesso dell'utente.
 *
 */

session_start();
require_once '../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Please, Insert email and password.";
        header("Location: ../signin_form.php");
        exit();
    }

    $sql = "SELECT Username, Email, Password FROM CUSTOMERS WHERE Email = ?";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            
            if ($password === $user['Password']) {
                // Password corretta
                session_regenerate_id(true);
                
                $_SESSION['loggedin'] = true;
                $_SESSION['user_email'] = $user['Email'];
                $_SESSION['username'] = $user['Username'];
                
                header("Location: ../index.php");
                exit();
                
            } else {
                // Password non corretta
                $_SESSION['error_message'] = "La password non è corretta.";
                header("Location: ../signin_form.php");
                exit();
            }
        } else {
            // Nessun utente trovato con quella email
            $_SESSION['error_message'] = "Nessun account trovato con questa email.";
            header("Location: ../signin_form.php");
            exit();
        }
        $stmt->close();
    }
    $conn->close();

} else {
    header("Location: ../signin_form.php");
    exit();
}
?>
