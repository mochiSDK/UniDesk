<?php
// Save theme.
if (isset($_POST['theme'])) {
    $_SESSION['theme'] = $_POST['theme'] === 'dark' ? 'dark' : 'light';
}

// Setting current theme (default to light).
$theme = $_SESSION['theme'] ?? 'light';
?>
