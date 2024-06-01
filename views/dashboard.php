<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../js/scripts.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Dashboard</h2>
        <div class="text-center">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">Add Data</button>
            <button class="btn btn-secondary" onclick="viewData()">View Data</button>
            <button class="btn btn-info" onclick="window.location.href='profile.php'">My Profile</button>
            <button class="btn btn-danger" onclick="logout()">Logout</button>
        </div>

        <!-- Add Data Modal -->
        <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addDataModalLabel">Add Data</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form id="addDataForm">
                            <div class="form-group">
                                <label for="full_name">Full Name</label>
                                <input type="text" name="full_name" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="division">Division</label>
                                <select name="division" id="division" class="form-control" required></select>
                            </div>
                            <div class="form-group">
                                <label for="district">District</label>
                                <select name="district" id="district" class="form-control" required></select>
                            </div>
                            <div class="form-group">
                                <label for="upazilla">Upazilla</label>
                                <select name="upazilla" id="upazilla" class="form-control" required></select>
                            </div>
                            <div class="form-group">
                                <label for="age">Age</label>
                                <input type="number" name="age" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="salary">Salary</label>
                                <input type="number" name="salary" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- View Data Section -->
        <div id="viewDataSection" class="mt-5"></div>
    </div>

    <script>
        function logout() {
            window.location.href = '../logout.php';
        }

        function viewData() {
            $.ajax({
                url: 'view_data.php',
                method: 'GET',
                success: function(data) {
                    let table = '<table class="table table-striped"><thead><tr><th>Full Name</th><th>Division</th><th>District</th><th>Upazilla</th><th>Age</th><th>Salary</th><th>Actions</th></tr></thead><tbody>';
                    data.forEach(row => {
                        table += `<tr><td>${row.full_name}</td><td>${row.division}</td><td>${row.district}</td><td>${row.upazilla}</td><td>${row.age}</td><td>${row.salary}</td><td><button class="btn btn-sm btn-warning">Update</button></td></tr>`;
                    });
                    table += '</tbody></table>';
                    $('#viewDataSection').html(table);
                }
            });
        }

        $(document).ready(function() {
            // Populate Division select box
            $.ajax({
                url: 'divisions.php',
                method: 'GET',
                success: function(data) {
                    $('#division').html('<option value="">Select Division</option>');
                    data.forEach(division => {
                        $('#division').append(`<option value="${division.id}">${division.name}</option>`);
                    });
                }
            });

            // Populate District select box based on selected Division
            $('#division').change(function() {
                const divisionId = $(this).val();
                if (divisionId) {
                    $.ajax({
                        url: 'districts.php',
                        method: 'GET',
                        data: { division_id: divisionId },
                        success: function(data) {
                            $('#district').html('<option value="">Select District</option>');
                            data.forEach(district => {
                                $('#district').append(`<option value="${district.id}">${district.name}</option>`);
                            });
                            $('#upazilla').html('<option value="">Select Upazilla</option>');
                        }
                    });
                } else {
                    $('#district').html('<option value="">Select Division First</option>');
                    $('#upazilla').html('<option value="">Select District First</option>');
                }
            });

            // Populate Upazilla select box based on selected District
            $('#district').change(function() {
                const districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: 'upazillas.php',
                        method: 'GET',
                        data: { district_id: districtId },
                        success: function(data) {
                            $('#upazilla').html('<option value="">Select Upazilla</option>');
                            data.forEach(upazilla => {
                                $('#upazilla').append(`<option value="${upazilla.id}">${upazilla.name}</option>`);
                            });
                        }
                    });
                } else {
                    $('#upazilla').html('<option value="">Select District First</option>');
                }
            });

            $('#addDataForm').on('submit', function(event) {
                event.preventDefault();
                $.ajax({
                    url: 'add_data.php',
                    method: 'POST',
                    data: $(this).serialize(),
                    success: function(data) {
                        if (data.status === 'success') {
                            alert('Data added successfully!');
                            $('#addDataModal').modal('hide');
                            viewData();
                        } else {
                            alert('Error adding data.');
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>
