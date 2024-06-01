// views/view_data.php
<?php
include '../includes/db.php';

$user_id = $_SESSION['user_id']; // Ensure user is logged in and their ID is stored in session
$stmt = $db->prepare("SELECT * FROM data WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($data);
?>
