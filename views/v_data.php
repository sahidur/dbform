<?php
// views/view_data.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit();
}

include '../includes/db.php';

$user_id = $_SESSION['user_id'];

$stmt = $db->prepare("SELECT * FROM user_data WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Table Example</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
</head>
<body>
    
<table id="myDataTable" class="display" style="width:100%">
    <thead>
        <tr>
            <th>ID</th>
            <th>User ID</th>
            <th>Full Name</th>
            <th>Division</th>
            <th>District</th>
            <th>Upazilla</th>
            <th>Age</th>
            <th>Salary</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach ($data as $row) {
                echo '<tr>';
                echo '<td>' . $row['id'] . '</td>';
                echo '<td>' . $row['user_id'] . '</td>';
                echo '<td>' . $row['full_name'] . '</td>';
                echo '<td>' . $row['division'] . '</td>';
                echo '<td>' . $row['district'] . '</td>';
                echo '<td>' . $row['upazilla'] . '</td>';
                echo '<td>' . $row['age'] . '</td>';
                echo '<td>' . $row['salary'] . '</td>';
                echo '</tr>';
            }
        ?>
    </tbody>
</table>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myDataTable').DataTable();
        buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
    });
</script>

</body>
</html>
