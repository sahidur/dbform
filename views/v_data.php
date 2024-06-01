<?php
// views/view_data.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DataTable Example</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.dataTables.min.js"></script>
    <style>
        /* You can add custom styles here */
    </style>
</head>
<body>

<table id="example" class="display" style="width:100%">
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
<script>
new DataTable('#example', {
    ajax: 'view_data.php',
    processing: true,
    serverSide: true
});
</script>

</body>
</html>
