<?php
require_once("../bootstrap.php");

if (!isset($_SESSION['user_email']) || empty($_SESSION['user_email'])) {
    // If not logged in, redirect to the sign-in page
    header("Location: ../signin_form.php");
    exit;
}

if (isset($_POST['action']) && isset($_POST['notificationId'])) {
    
    $action = $_POST['action'];
    $notificationId = $_POST['notificationId'];

    switch ($action) {
        case 'mark_read':
            $db_helper->readNotification($notificationId);
            $_SESSION['notification_action_message'] = "Notification marked as read.";
            break;
        case 'delete':
            $db_helper->deleteNotification($notificationId);
            $_SESSION['notification_action_message'] = "Notification successfully deleted.";
            break;
    }
}

header("Location: ../notifications.php");
exit;
?>

