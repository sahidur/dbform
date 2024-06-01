<?php
// views/add_data.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit();
}

include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['user_id'];
    $full_name = $_POST['full_name'];
    $division_id = $_POST['division'];
    $district_id = $_POST['district'];
    $upazill_id = $_POST['upazilla'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];

    // Fetch division name based on selected ID
$stmt = $db->prepare("SELECT name FROM divisions WHERE id = :division_id");
$stmt->bindParam(':division_id', $division_id);
$stmt->execute();
$division = $stmt->fetchColumn();

// Fetch district name based on selected ID
$stmt = $db->prepare("SELECT name FROM districts WHERE id = :district_id");
$stmt->bindParam(':district_id', $district_id);
$stmt->execute();
$district = $stmt->fetchColumn();

// Fetch upazilla name based on selected ID
$stmt = $db->prepare("SELECT name FROM upazillas WHERE id = :upazill_id");
$stmt->bindParam(':upazilla_id', $upazilla_id);
$stmt->execute();
$upazilla = $stmt->fetchColumn();



    $stmt = $db->prepare("INSERT INTO user_data (user_id, full_name, division, district, upazilla, age, salary) VALUES (:user_id, :full_name, :division, :district, :upazilla, :age, :salary)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':full_name', $full_name);
    $stmt->bindParam(':division', $division);
    $stmt->bindParam(':district', $district);
    $stmt->bindParam(':upazilla', $upazilla);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':salary', $salary);
    
    if ($stmt->execute()) {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success']);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error']);
    }
}
?>
