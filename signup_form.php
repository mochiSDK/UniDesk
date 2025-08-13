<?php
session_start();
?>
<!doctype html>
<html lang="it">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign up - UniDesk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/styles_exact.css" rel="stylesheet">
  </head>
  <body>
    <div class="auth-card">
      <h6 class="mb-3 fw-semibold">Create account</h6>
      <?php
        if (isset($_SESSION['error_message'])) {
            echo '<div class="alert alert-danger" role="alert">' . htmlspecialchars($_SESSION['error_message']) . '</div>';
            unset($_SESSION['error_message']);
        }
      ?>
      <form action="handlers/signup_handler.php" method="POST">
        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="bi bi-person"></i></span>
          <input type="text" class="form-control" placeholder="Username" autocomplete="name" name="username" required>
        </div>
        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="bi bi-envelope"></i></span>
          <input type="email" class="form-control" placeholder="Email" autocomplete="email" name="email" required>
        </div>
        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="bi bi-key"></i></span>
          <input type="password" class="form-control" placeholder="Password" autocomplete="new-password" name="password" required>
        </div>
        <div class="mb-3 input-group">
          <span class="input-group-text"><i class="bi bi-key-fill"></i></span>
          <input type="password" class="form-control" placeholder="Confirm password" autocomplete="new-password" name="confirm_password" required>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary">Sign up</button>
        </div>
      </form>
      <p class="text-center small mt-3 mb-0 small-muted">Already have an account? <a class="link" href="signin_form.php">Sign in</a></p>
    </div>
  </body>
</html>

