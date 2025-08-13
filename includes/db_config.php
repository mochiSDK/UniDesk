<?php
/*
 * db_config.php
 * File di configurazione per la connessione al database.
 */

// --- IMPOSTAZIONI DEL DATABASE ---

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root'); 
define('DB_PASSWORD', '');     
define('DB_NAME', 'UniDeskDB');

// --- CONNESSIONE AL DATABASE ---

$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Controlla la connessione

if ($conn->connect_error) {
    die("ERRORE: Impossibile connettersi al database. " . $conn->connect_error);
}

// Imposta il set di caratteri
$conn->set_charset("utf8mb4");
?>