<?php
// views/upazillas.php
include '../includes/db.php';

if (isset($_GET['district_id'])) {
    $district_id = $_GET['district_id'];
    $stmt = $db->prepare("SELECT * FROM upazillas WHERE district_id = :district_id");
    $stmt->bindParam(':district_id', $district_id);
    $stmt->execute();
    $upazillas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($upazillas);
}
?>
