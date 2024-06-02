<?php
// views/view_data.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit();
}

include '../includes/db.php';

$user_id = $_SESSION['user_id'];

$stmt = $db->prepare("SELECT * FROM user_data WHERE user_id = :user_id");
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KFW All Data</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #fff;
            color: #333;
            margin: 0;
            display: flex;
        }
        #menu {
            width: 200px;
            background-color: #f8f9fa;
            padding: 20px;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
        #menu ul {
            list-style-type: none;
            padding: 0;
        }
        #menu ul li {
            margin-bottom: 10px;
        }
        #menu ul li a {
            text-decoration: none;
            color: #333;
            font-weight: bold;
        }
        #content {
            flex: 1;
            padding: 20px;
        }
        table {
            width: 100%;
            margin: auto;
            background-color: #fff;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div id="menu">
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
    <div id="content">
        <h1>All Data</h1>
        <table id="myDataTable" class="display" style="width:100%">
            <thead>
            <tr>
                    <th>Sl.</th>
                    <th>Beneficiary ID</th>
                    <th>Beneficiary Name</th>
                    <th>Guardian Name</th>
                    <th>Sex</th>
                    <th>Age</th>
                    <th>National ID</th>
                    <th>Mobile Number</th>
                    <th>Current Division</th>
                    <th>Current District</th>
                    <th>Current Upazila</th>
                    <th>Current City Corporation</th>
                    <th>Current Ward No</th>
                    <th>Current Slum Name</th>
                    <th>Female Headed</th>
                    <th>HH Income</th>
                    <th>Climate Migrant</th>
                    <th>Division</th>
                    <th>District</th>
                    <th>Upazila</th>
                    <th>Slum Name</th>
                    <th>Climate Migration Cause</th>
                    <th>Disability Status</th>
                    <th>Disabled Members</th>
                    <th>Ethnic Group</th>
                    <th>Male Members</th>
                    <th>Female Members</th>
                    <th>Third Gender Members</th>
                    <th>Boys Under 18</th>
                    <th>Girls Under 18</th>
                    <th>Third Gender Under 18</th>
                    <th>Adolescent Boys</th>
                    <th>Adolescent Girls</th>
                    <th>Adolescent Third Gender</th>
                    <th>Training Name</th>
                    <th>Remarks</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($data as $row) {
                        echo '<tr>';
                        echo '<td>' . $row['id'] . '</td>';
                        echo '<td>' . $row['beneficiary_id'] . '</td>';
                        echo '<td>' . $row['beneficiary_name'] . '</td>';
                        echo '<td>' . $row['guardian_name'] . '</td>';
                        echo '<td>' . $row['sex'] . '</td>';
                        echo '<td>' . $row['age'] . '</td>';
                        echo '<td>' . $row['national_id'] . '</td>';
                        echo '<td>' . $row['mobile_number'] . '</td>';
                        echo '<td>' . $row['current_division'] . '</td>';
                        echo '<td>' . $row['current_district'] . '</td>';
                        echo '<td>' . $row['current_upazila'] . '</td>';
                        echo '<td>' . $row['current_city_corporation'] . '</td>';
                        echo '<td>' . $row['current_ward_no'] . '</td>';
                        echo '<td>' . $row['current_slum_name'] . '</td>';
                        echo '<td>' . $row['is_female_headed'] . '</td>';
                        echo '<td>' . $row['hh_income'] . '</td>';
                        echo '<td>' . $row['climate_migrant'] . '</td>';
                        echo '<td>' . $row['division'] . '</td>';
                        echo '<td>' . $row['district'] . '</td>';
                        echo '<td>' . $row['upazila'] . '</td>';
                        echo '<td>' . $row['slum_name'] . '</td>';
                        echo '<td>' . $row['climate_migration_cause'] . '</td>';
                        echo '<td>' . $row['disability_status'] . '</td>';
                        echo '<td>' . $row['disabled_members'] . '</td>';
                        echo '<td>' . $row['ethnic_group'] . '</td>';
                        echo '<td>' . $row['male_members'] . '</td>';
                        echo '<td>' . $row['female_members'] . '</td>';
                        echo '<td>' . $row['third_gender_members'] . '</td>';
                        echo '<td>' . $row['boys_under_18'] . '</td>';
                        echo '<td>' . $row['girls_under_18'] . '</td>';
                        echo '<td>' . $row['third_gender_under_18'] . '</td>';
                        echo '<td>' . $row['adolescent_boys'] . '</td>';
                        echo '<td>' . $row['adolescent_girls'] . '</td>';
                        echo '<td>' . $row['adolescent_third_gender'] . '</td>';
                        echo '<td>' . $row['training_name'] . '</td>';
                        echo '<td>' . $row['remarks'] . '</td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#myDataTable').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });
        });
    </script>
</body>
</html>
