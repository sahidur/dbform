<?php
// views/add_data.php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: signin.php');
    exit();
}
include '../includes/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $user_id = $_SESSION['user_id'];
    $beneficiary_id = $_POST['beneficiaryId'];
    $beneficiary_name = $_POST['beneficiaryName'];
    $guardian_name = $_POST['guardianName'];
    $sex = $_POST['sex'];
    $age = $_POST['age'];
    $national_id = $_POST['nationalId'];
    $mobile_number = $_POST['mobileNumber'];
    $current_division_id = $_POST['division'];
    $current_district_id = $_POST['district'];
    $current_upazila_id = $_POST['upazilla'];
    $current_city_corporation = $_POST['currentCityCorporation'];
    $current_ward_no = $_POST['currentWardNo'];
    $current_slum_name = $_POST['currentSlumName'];
    $is_female_headed = $_POST['isFemaleHeaded'] === 'Yes' ? true : false;
    $hh_income = $_POST['hhIncome'];
    $climate_migrant = $_POST['climateMigrant'] === 'Yes' ? true : false;
    $division_id = $_POST['pdivision'];
    $district_id = $_POST['pdistrict'];
    $upazila_id = $_POST['pupazila'];
    $slum_name = $_POST['slumName'];
    $climate_migration_cause = $_POST['climateMigrationCause'];
    $disability_status = $_POST['disabilityStatus'] === 'Yes' ? true : false;
    $disabled_members = $_POST['disabledMembers'];
    $ethnic_group = $_POST['ethnicGroup'] === 'Yes' ? true : false;
    $male_members = $_POST['maleMembers'];
    $female_members = $_POST['femaleMembers'];
    $third_gender_members = $_POST['thirdGenderMembers'];
    $boys_under_18 = $_POST['boysUnder18'];
    $girls_under_18 = $_POST['girlsUnder18'];
    $third_gender_under_18 = $_POST['thirdGenderUnder18'];
    $adolescent_boys = $_POST['adolescentBoys'];
    $adolescent_girls = $_POST['adolescentGirls'];
    $adolescent_third_gender = $_POST['adolescentThirdGender'];
    $training_name = $_POST['trainingName'];
    $remarks = $_POST['remarks'];


            // Fetch Permanent division name based on selected ID
$stmt = $db->prepare("SELECT name FROM divisions WHERE id = :division_id");
$stmt->bindParam(':division_id', $current_division_id);
$stmt->execute();
$current_division = $stmt->fetchColumn();

// Fetch Permanent district name based on selected ID
$stmt = $db->prepare("SELECT name FROM districts WHERE id = :district_id");
$stmt->bindParam(':district_id', $current_district_id);
$stmt->execute();
$current_district = $stmt->fetchColumn();

// Fetch Permanent upazilla name based on selected ID
$stmt = $db->prepare("SELECT name FROM upazillas WHERE id = :upazilla_id");
$stmt->bindParam(':upazilla_id', $current_upazila_id);
$stmt->execute();
$current_upazila = $stmt->fetchColumn();
        // Fetch Permanent division name based on selected ID
$stmt = $db->prepare("SELECT name FROM divisions WHERE id = :division_id");
$stmt->bindParam(':division_id', $division_id);
$stmt->execute();
$division = $stmt->fetchColumn();

// Fetch Permanent district name based on selected ID
$stmt = $db->prepare("SELECT name FROM districts WHERE id = :district_id");
$stmt->bindParam(':district_id', $district_id);
$stmt->execute();
$district = $stmt->fetchColumn();

// Fetch Permanent upazilla name based on selected ID
$stmt = $db->prepare("SELECT name FROM upazillas WHERE id = :upazilla_id");
$stmt->bindParam(':upazilla_id', $upazilla_id);
$stmt->execute();
$upazilla = $stmt->fetchColumn();

    // Prepare SQL and bind parameters
    $sql = "INSERT INTO user_data (user_id,
                beneficiary_id, beneficiary_name, guardian_name, sex, age, 
                national_id, mobile_number, current_division, current_district, 
                current_upazila, current_city_corporation, current_ward_no, 
                current_slum_name, is_female_headed, hh_income, climate_migrant, 
                division, district, upazila, slum_name, climate_migration_cause, 
                disability_status, disabled_members, ethnic_group, male_members, 
                female_members, third_gender_members, boys_under_18, girls_under_18, 
                third_gender_under_18, adolescent_boys, adolescent_girls, 
                adolescent_third_gender, training_name, remarks) 
            VALUES (
                :user_id,:beneficiary_id, :beneficiary_name, :guardian_name, :sex, :age, 
                :national_id, :mobile_number, :current_division, :current_district, 
                :current_upazila, :current_city_corporation, :current_ward_no, 
                :current_slum_name, :is_female_headed, :hh_income, :climate_migrant, 
                :division, :district, :upazila, :slum_name, :climate_migration_cause, 
                :disability_status, :disabled_members, :ethnic_group, :male_members, 
                :female_members, :third_gender_members, :boys_under_18, :girls_under_18, 
                :third_gender_under_18, :adolescent_boys, :adolescent_girls, 
                :adolescent_third_gender, :training_name, :remarks)";

    $stmt = $db->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':beneficiary_id', $beneficiary_id);
    $stmt->bindParam(':beneficiary_name', $beneficiary_name);
    $stmt->bindParam(':guardian_name', $guardian_name);
    $stmt->bindParam(':sex', $sex);
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':national_id', $national_id);
    $stmt->bindParam(':mobile_number', $mobile_number);
    $stmt->bindParam(':current_division', $current_division);
    $stmt->bindParam(':current_district', $current_district);
    $stmt->bindParam(':current_upazila', $current_upazila);
    $stmt->bindParam(':current_city_corporation', $current_city_corporation);
    $stmt->bindParam(':current_ward_no', $current_ward_no);
    $stmt->bindParam(':current_slum_name', $current_slum_name);
    $stmt->bindParam(':is_female_headed', $is_female_headed, PDO::PARAM_BOOL);
    $stmt->bindParam(':hh_income', $hh_income);
    $stmt->bindParam(':climate_migrant', $climate_migrant, PDO::PARAM_BOOL);
    $stmt->bindParam(':division', $division);
    $stmt->bindParam(':district', $district);
    $stmt->bindParam(':upazila', $upazila);
    $stmt->bindParam(':slum_name', $slum_name);
    $stmt->bindParam(':climate_migration_cause', $climate_migration_cause);
    $stmt->bindParam(':disability_status', $disability_status, PDO::PARAM_BOOL);
    $stmt->bindParam(':disabled_members', $disabled_members);
    $stmt->bindParam(':ethnic_group', $ethnic_group, PDO::PARAM_BOOL);
    $stmt->bindParam(':male_members', $male_members);
    $stmt->bindParam(':female_members', $female_members);
    $stmt->bindParam(':third_gender_members', $third_gender_members);
    $stmt->bindParam(':boys_under_18', $boys_under_18);
    $stmt->bindParam(':girls_under_18', $girls_under_18);
    $stmt->bindParam(':third_gender_under_18', $third_gender_under_18);
    $stmt->bindParam(':adolescent_boys', $adolescent_boys);
    $stmt->bindParam(':adolescent_girls', $adolescent_girls);
    $stmt->bindParam(':adolescent_third_gender', $adolescent_third_gender);
    $stmt->bindParam(':training_name', $training_name);
    $stmt->bindParam(':remarks', $remarks);

    // Execute the query
    if ($stmt->execute()) {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'success']);
    } else {
        header('Content-Type: application/json');
        echo json_encode(['status' => 'error']);
    }
}
?>
