<?php
include '../includes/db.php';

$stmt = $db->prepare("SELECT * FROM user_data");
$stmt->execute();
$alldata = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($alldata->num_rows > 0) {
    // Set headers for CSV file
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=data.csv');
    $output = fopen('php://output', 'w');

    // Fetching and outputting data row by row
    while ($row = $alldata->fetch_assoc()) {
        fputcsv($output, $row);
    }

    fclose($output);
} else {
    echo "0 results";
}

$conn->close();

?>
