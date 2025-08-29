<?php require_once "handlers/theme_handler.php"; ?>
<!doctype html>
<html lang="en" data-bs-theme="<?php echo $theme; ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $templateParams["title"]; ?> - UniDesk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>

<?php 
require_once 'navbar_controller.php'; 
?>

<div class="position-fixed top-30 start-50 translate-middle" style="z-index: 11">
    <?php if (isset($_SESSION['notification_action_message'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="min-width: 250px;">
            <?php echo $_SESSION['notification_action_message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['notification_action_message']); ?>
    <?php endif; ?>
</div>

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1><?php echo $templateParams["title"]; ?></h1>
        <a href="notifications.php" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-clockwise"></i> Refresh
        </a>
    </div>

    <?php if (empty($templateParams["notifications"])): ?>
        <div class="alert alert-info" role="alert">
            You have no new notifications.
        </div>
    <?php else: ?>
        <div class="list-group">
            <?php foreach ($templateParams["notifications"] as $notification): ?>
                <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center <?php echo ($notification['Status'] == 'Unread') ? 'list-group-item-light' : ''; ?>">
                    <p class="mb-0 flex-grow-1"><?php echo htmlspecialchars($notification['Description']); ?></p>
                    <div class="ms-3">
                        <form action="handlers/notification_handler.php" method="POST" class="d-inline">
                            <input type="hidden" name="notificationId" value="<?php echo $notification['NotificationId']; ?>">
                            <?php if ($notification['Status'] == 'Unread'): ?>
                                <button type="submit" name="action" value="mark_read" class="btn btn-sm btn-outline-primary me-2">
                                    <i class="bi bi-check-circle"></i> Mark as read
                                </button>
                            <?php endif; ?>
                            <button type="submit" name="action" value="delete" class="btn btn-sm btn-outline-danger">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
