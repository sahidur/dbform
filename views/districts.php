<?php
// views/districts.php
include '../includes/db.php';

if (isset($_GET['division_id'])) {
    $division_id = $_GET['division_id'];
    $stmt = $db->prepare("SELECT * FROM districts WHERE division_id = :division_id");
    $stmt->bindParam(':division_id', $division_id);
    $stmt->execute();
    $districts = $stmt->fetchAll(PDO::FETCH_ASSOC);
    header('Content-Type: application/json');
    echo json_encode($districts);
}
?>
