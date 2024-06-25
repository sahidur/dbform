<?php
// index.php
session_start();

if (isset($_SESSION['user_id'])) {
    session_regenerate_id(true); // Prevent session fixation
    header('Location: views/dashboard.php');
    exit();
} else {
    header('Location: views/signin.php');
    exit();
}
?>

