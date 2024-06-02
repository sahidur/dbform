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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css">
    <script src="../js/scripts.js"></script>
    <title>Dashboard</title>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">Dashboard</h2>
        <div class="text-center">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addDataModal">Add Data</button>
            <button class="btn btn-secondary" onclick="window.location.href='view_data.php'">View Data</button>
            <button class="btn btn-danger" nclick="window.location.href='logout.php'">Logout</button>
        </div>

        <!-- Add Data Modal -->
        <div class="modal fade" id="addDataModal" tabindex="-1" role="dialog" aria-labelledby="addDataModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                    <div class="container mt-5">
        <h2 style="text-align: center;">Beneficiary Profiling Form</h2>
        <form id="addDataForm">
            <!-- Beneficiary ID -->
            <div class="form-group">
                <label for="beneficiaryId">Beneficiary ID (Start with KFW4-CH-/KFW4-BISD-)</label>
                <input type="text" class="form-control" id="beneficiaryId" placeholder="Enter Beneficiary ID">
            </div>

            <!-- Name of beneficiary/ HH Head -->
            <div class="form-group">
                <label for="beneficiaryName">Name of Beneficiary/ HH Head</label>
                <input type="text" class="form-control" id="beneficiaryName" placeholder="Enter Name">
            </div>

            <!-- Guardian (Fathers/Mothers/Husband) name -->
            <div class="form-group">
                <label for="guardianName">Guardian (Fathers/Mothers/Husband) Name</label>
                <input type="text" class="form-control" id="guardianName" placeholder="Enter Guardian's Name">
            </div>

            <!-- Sex -->
            <div class="form-group">
                <label for="sex">Sex</label>
                <select class="form-control" id="sex">
                    <option>Male</option>
                    <option>Female</option>
                    <option>Third Gender</option>
                    <option>Other</option>
                </select>
            </div>

            <!-- Age -->
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" id="age" placeholder="Enter Age">
            </div>

            <!-- National ID/Birth Registration -->
            <div class="form-group">
                <label for="nationalId">National ID/Birth Registration</label>
                <input type="text" class="form-control" id="nationalId" placeholder="Enter National ID or Birth Registration">
            </div>

            <!-- Mobile Number -->
            <div class="form-group">
                <label for="mobileNumber">Mobile Number</label>
                <input type="text" class="form-control" id="mobileNumber" placeholder="Enter Mobile Number">
            </div>

            <!-- Current Division -->
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

            <!-- Current City Corporation/Municipality/ Union -->
            <div class="form-group">
                <label for="currentCityCorporation">Current City Corporation/Municipality/ Union</label>
                <input type="text" class="form-control" id="currentCityCorporation" placeholder="Enter City Corporation/Municipality/Union">
            </div>

            <!-- Current Ward No -->
            <div class="form-group">
                <label for="currentWardNo">Current Ward No</label>
                <input type="text" class="form-control" id="currentWardNo" placeholder="Enter Ward No">
            </div>

            <!-- Current Slum Name/Village /Area Name -->
            <div class="form-group">
                <label for="currentSlumName">Current Slum Name/Village/Area Name</label>
                <input type="text" class="form-control" id="currentSlumName" placeholder="Enter Slum/Village/Area Name">
            </div>

            <!-- Is the HH female headed -->
            <div class="form-group">
                <label for="isFemaleHeaded">Is the HH Female Headed</label>
                <select class="form-control" id="isFemaleHeaded">
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>

            <!-- HH average income (monthly) -->
            <div class="form-group">
                <label for="hhIncome">HH Average Income (Monthly)</label>
                <input type="number" class="form-control" id="hhIncome" placeholder="Enter Average Income">
            </div>

            <!-- Climate Migrant/displaced -->
            <div class="form-group">
                <label for="climateMigrant">Climate Migrant/Displaced?</label>
                <select class="form-control" id="climateMigrant">
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>

            <!-- Division -->
            <div class="form-group">
                <label for="division">Division</label>
                <select class="form-control" id="division">
                    <option>Division 1</option>
                    <option>Division 2</option>
                    <option>Division 3</option>
                    <!-- Add options as needed -->
                </select>
            </div>

            <!-- District -->
            <div class="form-group">
                <label for="district">District</label>
                <select class="form-control" id="district">
                    <option>District 1</option>
                    <option>District 2</option>
                    <option>District 3</option>
                    <!-- Add options as needed -->
                </select>
            </div>

            <!-- Upazila/Thana -->
            <div class="form-group">
                <label for="upazila">Upazila/Thana</label>
                <select class="form-control" id="upazila">
                    <option>Upazila 1</option>
                    <option>Upazila 2</option>
                    <option>Upazila 3</option>
                    <!-- Add options as needed -->
                </select>
            </div>

            <!-- Slum Name/Village /Area Name -->
            <div class="form-group">
                <label for="slumName">Slum Name/Village/Area Name</label>
                <input type="text" class="form-control" id="slumName" placeholder="Enter Slum/Village/Area Name">
            </div>

            <!-- Cause of climate migration -->
            <div class="form-group">
                <label for="climateMigrationCause">Cause of Climate Migration</label>
                <input type="text" class="form-control" id="climateMigrationCause" placeholder="Enter Cause of Climate Migration">
            </div>

            <!-- Disability (PWD) Status -->
            <div class="form-group">
                <label for="disabilityStatus">Disability (PWD) Status</label>
                <select class="form-control" id="disabilityStatus">
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>

            <!-- Number of disabled member in the family (if any) -->
            <div class="form-group">
                <label for="disabledMembers">Number of Disabled Members in the Family (if any)</label>
                <input type="number" class="form-control" id="disabledMembers" placeholder="Enter Number of Disabled Members">
            </div>

            <!-- Is the beneficiary belong to any ethnic group -->
            <div class="form-group">
                <label for="ethnicGroup">Is the Beneficiary Belong to Any Ethnic Group</label>
                <select class="form-control" id="ethnicGroup">
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>

            <!-- Male household members -->
            <div class="form-group">
                <label for="maleMembers">Male Household Members</label>
                <input type="number" class="form-control" id="maleMembers" placeholder="Enter Number of Male Household Members">
            </div>

            <!-- Female household members -->
            <div class="form-group">
                <label for="femaleMembers">Female Household Members</label>
                <input type="number" class="form-control" id="femaleMembers" placeholder="Enter Number of Female Household Members">
            </div>

            <!-- Third gender household members -->
            <div class="form-group">
                <label for="thirdGenderMembers">Third Gender Household Members</

label>
                <input type="number" class="form-control" id="thirdGenderMembers" placeholder="Enter Number of Third Gender Household Members">
            </div>

            <!-- Boy (bellow 18 Year) -->
            <div class="form-group">
                <label for="boysUnder18">Boys (below 18 Year)</label>
                <input type="number" class="form-control" id="boysUnder18" placeholder="Enter Number of Boys">
            </div>

            <!-- Girl (bellow 18 Year) -->
            <div class="form-group">
                <label for="girlsUnder18">Girls (below 18 Year)</label>
                <input type="number" class="form-control" id="girlsUnder18" placeholder="Enter Number of Girls">
            </div>

            <!-- Third Gender (bellow 18 Year) -->
            <div class="form-group">
                <label for="thirdGenderUnder18">Third Gender (below 18 Year)</label>
                <input type="number" class="form-control" id="thirdGenderUnder18" placeholder="Enter Number of Third Gender">
            </div>

            <!-- Adolescents boy (13-19 years) -->
            <div class="form-group">
                <label for="adolescentBoys">Adolescents Boys (13-19 years)</label>
                <input type="number" class="form-control" id="adolescentBoys" placeholder="Enter Number of Adolescent Boys">
            </div>

            <!-- Adolescents girl (13-19 years) -->
            <div class="form-group">
                <label for="adolescentGirls">Adolescents Girls (13-19 years)</label>
                <input type="number" class="form-control" id="adolescentGirls" placeholder="Enter Number of Adolescent Girls">
            </div>

            <!-- Adolescents third gender (13-19 years) -->
            <div class="form-group">
                <label for="adolescentThirdGender">Adolescents Third Gender (13-19 years)</label>
                <input type="number" class="form-control" id="adolescentThirdGender" placeholder="Enter Number of Adolescent Third Gender">
            </div>

            <!-- Name of training received -->
            <div class="form-group">
                <label for="trainingName">Name of Training Received</label>
                <input type="text" class="form-control" id="trainingName" placeholder="Enter Name of Training">
            </div>

            <!-- Remarks -->
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control" id="remarks" rows="3" placeholder="Enter Remarks"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- View Data Section -->
        <div id="viewDataSection" class="mt-5"></div>
    </div>

    <script>
        

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
                            location.reload();
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
