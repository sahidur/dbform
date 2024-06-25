<?php
// Function to read .env file and parse variables
function loadEnv($file)
{
    if (!file_exists($file)) {
        throw new Exception(".env file not found");
    }

    $variables = [];
    $lines = file($file, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) {
            continue;
        }

        list($key, $value) = explode('=', $line, 2);
        $variables[trim($key)] = trim($value);
    }
    return $variables;
}

// Load environment variables from .env file
$env = loadEnv(__DIR__ . '/../.env');

$host = $env['HOST'];
$port = $env['PORT'];
$dbname = $env['DBNAME'];
$user = $env['USER'];
$password = $env['PASSWORD'];

try {
    $db = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}
?>
