// js/scripts.js
$(document).ready(function() {
    $.ajax({
        url: 'divisions.php',
        method: 'GET',
        success: function(data) {
            $('#division').html('<option>Select Division</option>');
            data.forEach(division => {
                $('#division').append(`<option value="${division.id}">${division.name}</option>`);
            });
        }
    });

    $('#division').change(function() {
        const divisionId = $(this).val();
        if (divisionId) {
            $.ajax({
                url: 'districts.php',
                method: 'GET',
                data: { division_id: divisionId },
                success: function(data) {
                    $('#district').html('<option>Select District</option>');
                    data.forEach(district => {
                        $('#district').append(`<option value="${district.id}">${district.name}</option>`);
                    });
                }
            });
        } else {
            $('#district').html('<option>Select Division First</option>');
            $('#upazilla').html('<option>Select District First</option>');
        }
    });

    $('#district').change(function() {
        const districtId = $(this).val();
        if (districtId) {
            $.ajax({
                url: 'upazillas.php',
                method: 'GET',
                data: { district_id: districtId },
                success: function(data) {
                    $('#upazilla').html('<option>Select Upazilla</option>');
                    data.forEach(upazilla => {
                        $('#upazilla').append(`<option value="${upazilla.id}">${upazilla.name}</option>`);
                    });
                }
            });
        } else {
            $('#upazilla').html('<option>Select District First</option>');
        }
    });
});
