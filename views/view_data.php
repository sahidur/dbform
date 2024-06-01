<?php
// views/view_data.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit();
}

include '../includes/db.php';

$user_id = $_SESSION['user_id'];

$stmt = $db->prepare("SELECT * FROM user_data WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data);
?>
