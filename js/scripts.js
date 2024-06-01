// js/scripts.js
$(document).ready(function() {
    // Populate Division select box
    $.ajax({
        url: 'divisions.php',
        method: 'GET',
        success: function(data) {
            $('#division').html('<option value="">Select Division</option>');
            data.forEach(division => {
                $('#division').append(`<option value="${division.name}">${division.name}</option>`);
            });
        }
    });

    // Populate District select box based on selected Division
    $('#division').change(function() {
        const divisionId = ${division.id};
        if (divisionId) {
            $.ajax({
                url: 'districts.php',
                method: 'GET',
                data: { division_id: divisionId },
                success: function(data) {
                    $('#district').html('<option value="">Select District</option>');
                    data.forEach(district => {
                        $('#district').append(`<option value="${district.name}">${district.name}</option>`);
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
                        $('#upazilla').append(`<option value="${upazilla.name}">${upazilla.name}</option>`);
                    });
                }
            });
        } else {
            $('#upazilla').html('<option value="">Select District First</option>');
        }
    });
});
