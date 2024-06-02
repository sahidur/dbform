<?php
// index.php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: views/dashboard');
} else {
    header('Location: views/signin');
}
?>
