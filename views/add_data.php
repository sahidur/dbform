<?php
include '../includes/db.php';

$user_id = $_SESSION['user_id']; // Ensure user is logged in and their ID is stored in session
$full_name = $_POST['full_name'];
$division_id = $_POST['division']; // Get the selected division ID
$district_id = $_POST['district']; // Get the selected district ID
$upazilla_id = $_POST['upazilla']; // Get the selected upazilla ID
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
$stmt = $db->prepare("SELECT name FROM upazillas WHERE id = :upazilla_id");
$stmt->bindParam(':upazilla_id', $upazilla_id);
$stmt->execute();
$upazilla = $stmt->fetchColumn();

// Insert data into the database with actual names instead of IDs
$stmt = $db->prepare("INSERT INTO data (user_id, full_name, division, district, upazilla, age, salary) VALUES (:user_id, :full_name, :division, :district, :upazilla, :age, :salary)");
$stmt->bindParam(':user_id', $user_id);
$stmt->bindParam(':full_name', $full_name);
$stmt->bindParam(':division', $division);
$stmt->bindParam(':district', $district);
$stmt->bindParam(':upazilla', $upazilla);
$stmt->bindParam(':age', $age);
$stmt->bindParam(':salary', $salary);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}
?>
