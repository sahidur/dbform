// views/add_data.php
<?php
include '../includes/db.php';

$user_id = $_SESSION['user_id']; // Ensure user is logged in and their ID is stored in session
$full_name = $_POST['full_name'];
$division = $_POST['division'];
$district = $_POST['district'];
$upazilla = $_POST['upazilla'];
$age = $_POST['age'];
$salary = $_POST['salary'];

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
