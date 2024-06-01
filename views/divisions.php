<?php
// views/divisions.php
include '../includes/db.php';

$stmt = $db->prepare("SELECT * FROM divisions");
$stmt->execute();
$divisions = $stmt->fetchAll(PDO::FETCH_ASSOC);
header('Content-Type: application/json');
echo json_encode($divisions);
?>
