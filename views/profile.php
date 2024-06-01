<?php
// views/profile.php
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
    <title>KFW All Data</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            color: #333;
            margin: 0;
            display: flex;
        }
        #menu {
            width: 200px;
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        #menu ul {
            list-style-type: none;
            padding: 0;
        }
        #menu ul li {
            margin-bottom: 10px;
        }
        #menu ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        #content {
            flex: 1;
            padding: 20px;
        }
        table {
            width: 100%;
            margin: auto;
            background-color: #fff;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div id="menu">
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="settings.php">Settings</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <form method="post" action="profile.php" class="w-50 mx-auto">
            <div class="form-group">
                <label for="old_password">Old Password</label>
                <input type="password" name="old_password" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="new_password">New Password</label>
                <input type="password" name="new_password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Update Password</button>
        </form>
        <?php if (isset($message)) echo "<div class='alert alert-info'>$message</div>"; ?>
</body>
</html>
