// views/delete_data.php
<?php
include '../includes/db.php';

$id = $_POST['id'];

$stmt = $db->prepare("DELETE FROM data WHERE id = :id");
$stmt->bindParam(':id', $id);

if ($stmt->execute()) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}
?>
