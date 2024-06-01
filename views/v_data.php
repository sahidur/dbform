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
            <th>Name</th>
            <th>Age</th>
            <th>Country</th>
            <th>Email</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>John Doe</td>
            <td>30</td>
            <td>USA</td>
            <td>john@example.com</td>
        </tr>
        <tr>
            <td>Jane Smith</td>
            <td>25</td>
            <td>Canada</td>
            <td>jane@example.com</td>
        </tr>
        <!-- Add more rows here -->
    </tbody>
</table>

<button id="downloadButton">Download Data</button>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#myDataTable').DataTable();
    });

    // Download data button functionality
    $('#downloadButton').click(function(){
        // Functionality to download data here
        alert('Downloading data...');
    });
</script>

</body>
</html>
