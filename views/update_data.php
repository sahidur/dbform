// views/update_data.php
<?php
include '../includes/db.php';

$id = $_POST['id'];
$full_name = $_POST['full_name'];
$division = $_POST['division'];
$district = $_POST['district'];
$upazilla = $_POST['upazilla'];
$age = $_POST['age'];
$salary = $_POST['salary'];

$stmt = $db->prepare("UPDATE data SET full_name = :full_name, division = :division, district = :district, upazilla = :upazilla, age = :age, salary = :salary WHERE id = :id");
$stmt->bindParam(':id', $id);
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
