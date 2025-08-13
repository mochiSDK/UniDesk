<?php
session_start();
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign in - UniDesk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/styles_exact.css" rel="stylesheet">
  </head>
  <body>
    <div class="auth-card">
      <h6 class="mb-3 fw-semibold">UniDesk</h6>
      <?php
        if (isset($_SESSION['success_message'])) {
            echo '<div class="alert alert-success" role="alert">' . htmlspecialchars($_SESSION['success_message']) . '</div>';
            unset($_SESSION['success_message']);
        }
        if (isset($_SESSION['error_message'])) {
            echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_SESSION['error_message']) . '</div>';
            unset($_SESSION['error_message']);
        }
      ?>
      <form action="handlers/signin_handler.php" method="POST">
        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="bi bi-envelope"></i></span>
          <input type="email" class="form-control" placeholder="Email" autocomplete="username" name="email" required>
        </div>
        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="bi bi-key"></i></span>
          <input type="password" class="form-control" placeholder="Password" autocomplete="current-password" name="password" required>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Sign in</button>
        </div>
      </form>
      <p class="text-center small mt-3 mb-0 small-muted">New User? <a class="link" href="signup_form.php">Sign up</a></p>
    </div>
  </body>
</html>

