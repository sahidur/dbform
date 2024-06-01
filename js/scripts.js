// js/scripts.js
document.addEventListener('DOMContentLoaded', function() {
    populateDivision();

    document.getElementById('addDataForm').addEventListener('submit', function(event) {
        event.preventDefault();
        addData();
    });
});

function openModal(modalId) {
    document.getElementById(modalId).style.display = 'block';
}

function closeModal(modalId) {
    document.getElementById(modalId).style.display = 'none';
}

function populateDivision() {
    // Populate division dropdown
}

function addData() {
    // Add data to the database via AJAX
}

function viewData() {
    // Fetch and display data in the table
}

function downloadData() {
    // Download all data as CSV
}

function logout() {
    // Log out the user
}
