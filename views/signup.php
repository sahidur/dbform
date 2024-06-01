<?php
// views/signup.php
include '../includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (registerUser($username, $password)) {
        header('Location: signin.php');
    } else {
        $error = "Registration failed.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <title>Sign Up</title>
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form method="post" action="signup.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="signin.php">Sign In</a></p>
    </div>
</body>
</html>
