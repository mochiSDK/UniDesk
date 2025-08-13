<?php
/*
 * signup_handler.php
 * Gestisce la logica di registrazione dell'utente.
 *
 */

session_start();
require_once '../includes/db_config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // 1. RECUPERA I DATI DAL FORM
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $confirm_password = trim($_POST['confirm_password']);

    // 2. VALIDAZIONE DEI DATI
    if (empty($username) || empty($email) || empty($password) || empty($confirm_password)) {
        $_SESSION['error_message'] = "Per favore, compila tutti i campi.";
        header("Location: ../signup_form.php");
        exit();
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Formato email non valido.";
        header("Location: ../signup_form.php");
        exit();
    }
    // MODIFICA: Lunghezza minima della password cambiata a 4.
    if (strlen($password) < 4) {
        $_SESSION['error_message'] = "La password deve contenere almeno 4 caratteri.";
        header("Location: ../signup_form.php");
        exit();
    }
    if ($password !== $confirm_password) {
        $_SESSION['error_message'] = "Le password non coincidono.";
        header("Location: ../signup_form.php");
        exit();
    }

    // 3. CONTROLLA SE L'EMAIL ESISTE GIÀ
    $sql = "SELECT Email FROM CUSTOMERS WHERE Email = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $_SESSION['error_message'] = "Un account con questa email esiste già.";
            header("Location: ../signup_form.php");
            exit();
        }
        $stmt->close();
    }

    // 4. HASHING RIMOSSO

    // 5. INSERISCI IL NUOVO UTENTE NEL DATABASE
    $sql = "INSERT INTO CUSTOMERS (Username, Email, Password, IsVendor) VALUES (?, ?, ?, ?)";
    if ($stmt = $conn->prepare($sql)) {
        $is_vendor = 0;
        // MODIFICA: La variabile $password viene usata direttamente.
        $stmt->bind_param("sssi", $username, $email, $password, $is_vendor);

        if ($stmt->execute()) {
            $_SESSION['success_message'] = "Registrazione completata! Ora puoi accedere.";
            header("Location: ../signin_form.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Oops! Qualcosa è andato storto. Riprova più tardi.";
            header("Location: ../signup_form.php");
            exit();
        }
        $stmt->close();
    }

    $conn->close();

} else {
    header("Location: ../signup_form.php");
    exit();
}
?>
