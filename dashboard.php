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
        <div class="text-center mb-3">
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
                    let table = '<table class="table table-striped table-responsive"><thead><tr><th>Full Name</th><th>Division</th><th>District</th><th>Upazilla</th><th>Age</th><th>Salary</th><th>Actions</th></tr></thead><tbody>';
                    data.forEach(row => {
                        table += `<tr><td>${row.full_name}</td><td>${row.division}</td><td>${row.district}</td><td>${row.upazilla}</td><td>${row.age}</td><td>${row.salary}</td><td><button class="btn btn-sm btn-warning" onclick="updateData(${row.id})">Update</button> <button class="btn btn-sm btn-danger" onclick="deleteData(${row.id})">Delete</button></td></tr>`;
                    });
                    table += '</tbody></table>';
                    $('#viewDataSection').html(table);
                }
            });
        }

        function updateData(id) {
            $.ajax({
                url: `get_data.php?id=${id}`,
                method: 'GET',
                success: function(data) {
                    $('#updateDataModal #full_name').val(data.full_name);
                    $('#updateDataModal #division').val(data.division);
                    $('#updateDataModal #district').val(data.district);
                    $('#updateDataModal #upazilla').val(data.upazilla);
                    $('#updateDataModal #age').val(data.age);
                    $('#updateDataModal #salary').val(data.salary);
                    $('#updateDataModal #id').val(data.id);
                    $('#updateDataModal').modal('show');
                }
            });
        }

        function deleteData(id) {
            if (confirm('Are you sure you want to delete this data?')) {
                $.ajax({
                    url: 'delete_data.php',
                    method: 'POST',
                    data: { id: id },
                    success: function(response) {
                        if (response.status === 'success') {
                            alert('Data deleted successfully!');
                            viewData();
                        } else {
                            alert('Error deleting data.');
                        }
                    }
                });
            }
        }

        $(document).ready(function() {
            // Populate Division select box
            $.ajax({
                url: 'divisions.php',
                method: 'GET',
                success: function(response) {
                    console.log(response); // Log the response to check the data structure
                    if (Array.isArray(response)) {
                        $('#division').html('<option value="">Select Division</option>');
                        response.forEach(division => {
                            $('#division').append(`<option value="${division.id}">${division.name}</option>`);
                        });
                    } else {
                        console.error('Response is not an array:', response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error:', status, error);
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
                        success: function(response) {
                            if (Array.isArray(response)) {
                                $('#district').html('<option value="">Select District</option>');
                                response.forEach(district => {
                                    $('#district').append(`<option value="${district.id}">${district.name}</option>`);
                                });
                                $('#upazilla').html('<option value="">Select Upazilla</option>');
                            } else {
                                console.error('Response is not an array:', response);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', status, error);
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
                        success: function(response) {
                            if (Array.isArray(response)) {
                                $('#upazilla').html('<option value="">Select Upazilla</option>');
                                response.forEach(upazilla => {
                                    $('#upazilla').append(`<option value="${upazilla.id}">${upazilla.name}</option>`);
                                });
                            } else {
                                console.error('Response is not an array:', response);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', status, error);
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
