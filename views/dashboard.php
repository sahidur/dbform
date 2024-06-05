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
            <button class="btn btn-secondary" onclick="window.location.href='view_data'">View Data</button>
            <button class="btn btn-danger" onclick="window.location.href='logout'">Logout</button>
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
                <input type="text" class="form-control" name="beneficiaryId" id="beneficiaryId" placeholder="Enter Beneficiary ID" required>
            </div>

            <!-- Name of beneficiary/ HH Head -->
            <div class="form-group">
                <label for="beneficiaryName">Name of Beneficiary/ HH Head</label>
                <input type="text" class="form-control" name="beneficiaryName" id="beneficiaryName" placeholder="Enter Name" required>
            </div>

            <!-- Guardian (Fathers/Mothers/Husband) name -->
            <div class="form-group">
                <label for="guardianName">Guardian (Fathers/Mothers/Husband) Name</label>
                <input type="text" class="form-control"  name="guardianName" id="guardianName" placeholder="Enter Guardian's Name" required>
            </div>

            <!-- Sex -->
            <div class="form-group">
                <label for="sex">Sex</label>
                <select class="form-control"  name="sex" id="sex" required>
                <option value="">Please Select</option> 
                <option>Male</option>
                    <option>Female</option>
                    <option>Third Gender</option>
                    <option>Other</option>
                </select>
            </div>

            <!-- Age -->
            <div class="form-group">
                <label for="age">Age</label>
                <input type="number" class="form-control" name="age" id="age" placeholder="Enter Age" required>
                <div class="error" id="ageError"></div>
            </div>

            <!-- National ID/Birth Registration -->
            <div class="form-group">
                <label for="nationalId">National ID/Birth Registration</label>
                <input type="text" class="form-control" name="nationalId" id="nationalId" placeholder="Enter National ID or Birth Registration" required>
            </div>

            <!-- Mobile Number -->
            <div class="form-group">
                <label for="mobileNumber">Mobile Number</label>
                <input type="text" class="form-control" name="mobileNumber" id="mobileNumber" placeholder="Enter Mobile Number" required>
                <div class="error" id="mobileNumberError"></div>
            </div>

            <!-- Current Division -->
            <div class="form-group">
                                <label for="division">Current Division</label>
                                <select name="division" id="division" class="form-control" required></select>
                            </div>
                            <div class="form-group">
                                <label for="district">Current District</label>
                                <select name="district" id="district" class="form-control" required></select>
                            </div>
                            <div class="form-group">
                                <label for="upazilla">Current Upazila/Thana</label>
                                <select name="upazilla" id="upazilla" class="form-control" required></select>
                            </div>

            <!-- Current City Corporation/Municipality/ Union -->
            <div class="form-group">
                <label for="currentCityCorporation">Current City Corporation/Municipality/ Union</label>
                <input type="text" class="form-control" name="currentCityCorporation" id="currentCityCorporation" placeholder="Enter City Corporation/Municipality/Union" required>
            </div>

            <!-- Current Ward No -->
            <div class="form-group">
                <label for="currentWardNo">Current Ward No</label>
                <input type="text" class="form-control" name="currentWardNo" id="currentWardNo" placeholder="Enter Ward No" required>
            </div>

            <!-- Current Slum Name/Village /Area Name -->
            <div class="form-group">
                <label for="currentSlumName">Current Slum Name/Village/Area Name</label>
                <input type="text" class="form-control" name="currentSlumName" id="currentSlumName" placeholder="Enter Slum/Village/Area Name" required>
            </div>

            <!-- Is the HH female headed -->
            <div class="form-group">
                <label for="isFemaleHeaded">Is the HH Female Headed</label>
                <select class="form-control" name="isFemaleHeaded" id="isFemaleHeaded" required>
                <option value="">Please Select</option>     
                <option>Yes</option>
                    <option>No</option>
                </select>
            </div>

            <!-- HH average income (monthly) -->
            <div class="form-group">
                <label for="hhIncome">HH Average Income (Monthly)</label>
                <input type="number" class="form-control" name="hhIncome" id="hhIncome" placeholder="Enter Average Income" required>
            </div>

            <!-- Climate Migrant/displaced -->
            <div class="form-group">
    <label for="climateMigrant">Climate Migrant/Displaced?</label>
    <select class="form-control" name="climateMigrant" id="climateMigrant" required onchange="toggleAdditionalQuestions()">
    <option value="no">Please Select</option>    
    <option value="yes">Yes</option>
        <option value="no">No</option>
    </select>
</div>

<!-- Additional Questions -->
<div id="additionalQuestions" style="display: none;">
    <!-- Division -->
    <div class="form-group">
        <label for="pdivision">Climate Division</label>
        <select name="pdivision" id="pdivision" class="form-control" required></select>
    </div>
    <div class="form-group">
        <label for="pdistrict">Climate District</label>
        <select name="pdistrict" id="pdistrict" class="form-control" required></select>
    </div>
    <div class="form-group">
        <label for="pupazilla">Climate Upazila/Thana</label>
        <select name="pupazilla" id="pupazilla" class="form-control" required></select>
    </div>
    <!-- Slum Name/Village/Area Name -->
    <div class="form-group">
        <label for="slumName">Climate Slum Name/Village/Area Name</label>
        <input type="text" class="form-control" name="slumName" id="slumName" placeholder="Enter Climate Slum/Village/Area Name" required>
    </div>
    <!-- Cause of climate migration -->
    <div class="form-group">
        <label for="disabilityStatus">Select Cause of Climate Migration</label>
        <select class="form-control" name="climateMigrationCause" id="climateMigrationCause" required>
            <option value="">Please Select</option> 
            <option>Droughts, cyclone, floods, and other extreme weather events devastated homes, and infrastructure</option>
            <option>River Erosion</option>
            <option>Reduced Crops Production and Cultivation</option>
            <option>Livelihoods Lost due to Natural Disaster</option>
            <option>Water Crisis</option>
            <option>Food Crisis</option>
            <option>Frequent Natural Disaster</option>
            <option>Increased Salinity</option>
        </select>
    </div>
</div>

            <!-- Disability Status -->
            <div class="form-group">
                <label for="disabilityStatus">Students with disabilities Status</label>
                <select class="form-control" name="disabilityStatus" id="disabilityStatus" required>
                <option value="">Please Select</option>     
                <option>Yes</option>
                    <option>No</option>
                </select>
            </div>

            <!-- Number of disabled member in the family (if any) -->
            <div class="form-group">
                <label for="disabledMembers">Number of Disabled Members in the Family (if any)</label>
                <input type="number" class="form-control" name="disabledMembers" id="disabledMembers" placeholder="Enter Number of Disabled Members" required>
            </div>

            <!-- Is the beneficiary belong to any ethnic group -->
            <div class="form-group">
                <label for="ethnicGroup">Is the Beneficiary Belong to Any Ethnic Group</label>
                <select class="form-control" name="ethnicGroup" id="ethnicGroup" required>
                    <option value="">Please Select</option> 
                    <option>Yes</option>
                    <option>No</option>
                </select>
            </div>

            <!-- Male household members -->
            <div class="form-group">
                <label for="maleMembers">Male Household Members</label>
                <input type="number" class="form-control" name="maleMembers" id="maleMembers" placeholder="Enter Number of Male Household Members" required>
            </div>

            <!-- Female household members -->
            <div class="form-group">
                <label for="femaleMembers">Female Household Members</label>
                <input type="number" class="form-control"  name="femaleMembers" id="femaleMembers" placeholder="Enter Number of Female Household Members" required>
            </div>

            <!-- Third gender household members -->
            <div class="form-group">
                <label for="thirdGenderMembers">Third Gender Household Members</label>
                <input type="number" class="form-control" name="thirdGenderMembers" id="thirdGenderMembers" placeholder="Enter Number of Third Gender Household Members" required>
            </div>

            <!-- Boy (bellow 18 Year) -->
            <div class="form-group">
                <label for="boysUnder18">Boys (below 18 Year)</label>
                <input type="number" class="form-control" name="boysUnder18" id="boysUnder18" placeholder="Enter Number of Boys" required>
            </div>

            <!-- Girl (bellow 18 Year) -->
            <div class="form-group">
                <label for="girlsUnder18">Girls (below 18 Year)</label>
                <input type="number" class="form-control" name="girlsUnder18" id="girlsUnder18" placeholder="Enter Number of Girls" required>
            </div>

            <!-- Third Gender (bellow 18 Year) -->
            <div class="form-group">
                <label for="thirdGenderUnder18">Third Gender (below 18 Year)</label>
                <input type="number" class="form-control" name="thirdGenderUnder18" id="thirdGenderUnder18" placeholder="Enter Number of Third Gender" required>
            </div>

            <!-- Adolescents boy (13-19 years) -->
            <div class="form-group">
                <label for="adolescentBoys">Adolescents Boys (13-19 years)</label>
                <input type="number" class="form-control" name="adolescentBoys" id="adolescentBoys" placeholder="Enter Number of Adolescent Boys" required>
            </div>

            <!-- Adolescents girl (13-19 years) -->
            <div class="form-group">
                <label for="adolescentGirls">Adolescents Girls (13-19 years)</label>
                <input type="number" class="form-control" name="adolescentGirls" id="adolescentGirls" placeholder="Enter Number of Adolescent Girls" required>
            </div>

            <!-- Adolescents third gender (13-19 years) -->
            <div class="form-group">
                <label for="adolescentThirdGender">Adolescents Third Gender (13-19 years)</label>
                <input type="number" class="form-control" name="adolescentThirdGender" id="adolescentThirdGender" placeholder="Enter Number of Adolescent Third Gender" required>
            </div>

            <!-- Name of training received -->
            <div class="form-group">
                <label for="trainingName">Name of Training Received</label>
                <input type="text" class="form-control" name="trainingName" id="trainingName" placeholder="Enter Name of Training" required>
            </div>

            <!-- Remarks -->
            <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea class="form-control" name="remarks" id="remarks" rows="3" placeholder="Enter Remarks" required></textarea>
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
    function toggleAdditionalQuestions() {
        var selectBox = document.getElementById("climateMigrant");
        var additionalQuestions = document.getElementById("additionalQuestions");

        if (selectBox.value === "yes") {
            additionalQuestions.style.display = "block";
        } else {
            additionalQuestions.style.display = "none";
            document.getElementById("pdivision").selectedIndex = -1;
            document.getElementById("pdistrict").selectedIndex = -1;
            document.getElementById("pupazilla").selectedIndex = -1;
            document.getElementById("climateMigrationCause").selectedIndex = -1;
            document.getElementById("slumName").value = "";
            
        }
    }
</script>

    <script>

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

            //Permanent Address
            $.ajax({
                url: 'divisions.php',
                method: 'GET',
                success: function(data) {
                    $('#pdivision').html('<option value="">Select Climate Division</option>');
                    data.forEach(division => {
                        $('#pdivision').append(`<option value="${division.id}">${division.name}</option>`);
                    });
                }
            });

            // Populate District select box based on selected Division
            $('#pdivision').change(function() {
                const divisionId = $(this).val();
                if (divisionId) {
                    $.ajax({
                        url: 'districts.php',
                        method: 'GET',
                        data: { division_id: divisionId },
                        success: function(data) {
                            $('#pdistrict').html('<option value="">Select Climate District</option>');
                            data.forEach(district => {
                                $('#pdistrict').append(`<option value="${district.id}">${district.name}</option>`);
                            });
                            $('#pupazilla').html('<option value="">Select Upazilla</option>');
                        }
                    });
                } else {
                    $('#pdistrict').html('<option value="">Select Division First</option>');
                    $('#pupazilla').html('<option value="">Select District First</option>');
                }
            });

            // Populate Upazilla select box based on selected District
            $('#pdistrict').change(function() {
                const districtId = $(this).val();
                if (districtId) {
                    $.ajax({
                        url: 'upazillas.php',
                        method: 'GET',
                        data: { district_id: districtId },
                        success: function(data) {
                            $('#pupazilla').html('<option value="">Select Permanent Upazilla</option>');
                            data.forEach(upazilla => {
                                $('#pupazilla').append(`<option value="${upazilla.id}">${upazilla.name}</option>`);
                            });
                        }
                    });
                } else {
                    $('#pupazilla').html('<option value="">Select District First</option>');
                }
            });
            
            function validateAge() {
            const age = document.getElementById('age').value;
            const ageError = document.getElementById('ageError');
            if (age < 14 || age > 18) {
                ageError.textContent = 'Age must be between 14 and 18.';
                return false;
            } else {
                ageError.textContent = '';
                return true;
            }
        }

        function validateMobileNumber() {
            const mobileNumber = document.getElementById('mobileNumber').value;
            const mobileNumberError = document.getElementById('mobileNumberError');
            const mobileRegex = /^(?:\+88|88)?(01[3-9]\d{8})$/;
            if (!mobileRegex.test(mobileNumber)) {
                mobileNumberError.textContent = 'Invalid mobile number.';
                return false;
            } else {
                mobileNumberError.textContent = '';
                return true;
            }
        }

        document.getElementById('addDataForm').addEventListener('submit', function(event) {
            event.preventDefault(); // Prevent form submission
            validateForm();
        });

        document.getElementById('age').addEventListener('input', validateAge);
        document.getElementById('mobileNumber').addEventListener('input', validateMobileNumber);

        function validateForm() {
            const isAgeValid = validateAge();
            const isMobileNumberValid = validateMobileNumber();
        }

        function validateAge() {
            const age = document.getElementById('age').value;
            const ageError = document.getElementById('ageError');
            if (age < 14 || age > 18) {
                ageError.textContent = 'Age must be between 14 and 18.';
                return false;
            } else {
                ageError.textContent = '';
                return true;
            }
        }

        function validateMobileNumber() {
            const mobileNumber = document.getElementById('mobileNumber').value;
            const mobileNumberError = document.getElementById('mobileNumberError');
            const mobileRegex = /^(?:\+88|88)?(01[3-9]\d{8})$/;
            if (!mobileRegex.test(mobileNumber)) {
                mobileNumberError.textContent = 'Invalid mobile number.';
                return false;
            } else {
                mobileNumberError.textContent = '';
                return true;
            }
        }
        
        
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
