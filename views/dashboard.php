<?php
// views/dashboard.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit();
}

include '../includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/scripts.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <div class="container">
        <h2>Dashboard</h2>
        <button onclick="openModal('addDataModal')">Add Data</button>
        <button onclick="viewData()">View Data</button>
        <button onclick="window.location.href='profile.php'">My Profile</button>
        <button onclick="logout()">Logout</button>

        <div id="addDataModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('addDataModal')">&times;</span>
                <form id="addDataForm">
                    <input type="text" name="full_name" placeholder="Full Name" required>
                    <select name="division" id="division" required></select>
                    <select name="district" id="district" required></select>
                    <select name="upazilla" id="upazilla" required></select>
                    <input type="number" name="age" placeholder="Age" required>
                    <input type="number" step="0.01" name="salary" placeholder="Salary" required>
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>

        <div id="viewDataModal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal('viewDataModal')">&times;</span>
                <table id="dataTable">
                    <!-- Table data will be populated here -->
                </table>
                <button onclick="downloadData()">Download Data</button>
            </div>
        </div>
    </div>
</body>
</html>
