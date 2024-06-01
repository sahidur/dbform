<?php
// profile.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit();
}

include '../includes/db.php';
include '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    
    $user_id = $_SESSION['user_id'];
    $stmt = $db->prepare("SELECT password FROM users WHERE id = :user_id");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if ($user && password_verify($old_password, $user['password'])) {
        $hashedNewPassword = password_hash($new_password, PASSWORD_BCRYPT);
        $stmt = $db->prepare("UPDATE users SET password = :new_password WHERE id = :user_id");
        $stmt->bindParam(':new_password', $hashedNewPassword);
        $stmt->bindParam(':user_id', $user_id);
        if ($stmt->execute()) {
            $message = "Password updated successfully.";
        } else {
            $message = "Error updating password.";
        }
    } else {
        $message = "Old password is incorrect.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Profile</title>
</head>
<body>
    <div class="container">
        <h2>My Profile</h2>
        <form method="post" action="profile.php">
            <input type="password" name="old_password" placeholder="Old Password" required>
            <input type="password" name="new_password" placeholder="New Password" required>
            <button type="submit">Update Password</button>
        </form>
        <?php if (isset($message)) { echo "<p>$message</p>"; } ?>
        <button onclick="window.location.href='dashboard.php'">Back to Dashboard</button>
    </div>
</body>
</html>
