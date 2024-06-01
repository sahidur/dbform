<?php
// views/divisions.php
include '../includes/db.php';

$stmt = $db->prepare("SELECT * FROM divisions");
$stmt->execute();
$divisions = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($divisions);
?>
