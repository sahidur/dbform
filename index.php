<?php
// index.php
session_start();

if (isset($_SESSION['user_id'])) {
    session_regenerate_id(true); // Prevent session fixation
    header('Location: views/dashboard');
    exit();
} else {
    header('Location: views/signin');
    exit();
}
?>

