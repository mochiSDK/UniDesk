<?php
// Save theme.
if (isset($_POST['theme'])) {
    $_SESSION['theme'] = $_POST['theme'] === 'dark' ? 'dark' : 'light';
    // This clears the navigation history from the theme POST request by building the correct redirect url.
    $redirectUrl = $_SERVER['PHP_SELF'];
    if (!empty($_SERVER['QUERY_STRING'])) {
        $redirectUrl .= '?' . $_SERVER['QUERY_STRING'];
    }
    header("Location: $redirectUrl");
    exit;
}

// Setting current theme (default to light).
$theme = $_SESSION['theme'] ?? 'light';
?>
