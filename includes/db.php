<?php
// includes/db.php
$host = "db-postgresql-somadhan-do-user-2226216-0.c.db.ondigitalocean.com";
$dbname = "kfw-data";
$user = "kfwadmin"; // Change to your PostgreSQL username
$password = "AVNS_Pu-s3I8f"; // Change to your PostgreSQL password
$port = 25060;



try {
    $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>