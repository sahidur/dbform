// js/scripts.js

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
