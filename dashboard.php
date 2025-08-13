<?php
session_start();

// Se l'utente non è loggato, lo reindirizza alla pagina di accesso.
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: signin_form.php");
    exit;
}
?>
<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="styles_exact.css" rel="stylesheet">
</head>
<body>
    <div class="auth-card">
        <h4 class="text-center">Benvenuto, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h4>
        <p class="text-center mt-3">Sei stato autenticato con successo.</p>
        <div class="d-grid mt-4">
            <a href="logout.php" class="btn btn-primary">Logout</a>
        </div>
    </div>
</body>
</html>

