<?php

session_start();

// Rimuove tutte le variabili di sessione.
$_SESSION = array();

// Distrugge la sessione.
session_destroy();

// Reindirizza alla pagina di accesso.
header("Location: signin_form.php");
exit;
?>
