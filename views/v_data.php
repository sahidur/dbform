<?php

// Sample data
$data = '[{"id":1,"user_id":1,"full_name":"Sahid","division":"1","district":"1","upazilla":"1","age":23,"salary":"44.00"},{"id":2,"user_id":1,"full_name":"Sahid","division":"1","district":"1","upazilla":"1","age":23,"salary":"44.00"}]';
$data = json_decode($data, true);

// Number of records per page
$recordsPerPage = 10;

// Get current page number
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate offset
$offset = ($page - 1) * $recordsPerPage;

// Apply pagination
$data = array_slice($data, $offset, $recordsPerPage);

// HTML table
echo '<table border="1">';
echo '<tr><th>ID</th><th>User ID</th><th>Full Name</th><th>Division</th><th>District</th><th>Upazilla</th><th>Age</th><th>Salary</th></tr>';

// Loop through data and display in table rows
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
echo '</table>';

// Pagination links
$totalRecords = count($data); // Assuming this is the total number of records from API
$totalPages = ceil($totalRecords / $recordsPerPage);
echo '<br><div>';
for ($i = 1; $i <= $totalPages; $i++) {
    echo '<a href="?page=' . $i . '">' . $i . '</a> ';
}
echo '</div>';

// Search form
echo '<br><form method="get">';
echo '<input type="text" name="search" placeholder="Search...">';
echo '<input type="submit" value="Search">';
echo '</form>';

// Download link
echo '<br><a href="download.php">Download CSV</a>';

?>
