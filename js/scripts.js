// js/scripts.js
$(document).ready(function() {
    // Load divisions on page load
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

    // Load districts based on selected division
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
                }
            });
        } else {
            $('#district').html('<option value="">Select Division First</option>');
            $('#upazilla').html('<option value="">Select District First</option>');
        }
    });

    // Load upazillas based on selected district
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

    // Add data form submission
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
