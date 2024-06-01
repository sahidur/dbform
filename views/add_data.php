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
    $division = $_POST['division'];
    $district = $_POST['district'];
    $upazilla = $_POST['upazilla'];
    $age = $_POST['age'];
    $salary = $_POST['salary'];

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
