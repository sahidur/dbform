<?php
// views/signin.php
include '../includes/functions.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verify reCAPTCHA token
    $recaptcha_secret = '6Lfh2wAqAAAAAKZPKpXqtTOw9nwoMFhyum3hMIV2';
    $recaptcha_response = $_POST['recaptcha_token'];
    $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';

    $recaptcha_data = [
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_response
    ];

    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($recaptcha_data)
        ]
    ];

    $context = stream_context_create($options);
    $response = file_get_contents($recaptcha_url, false, $context);
    $result = json_decode($response, true);

    if (!$result['success'] || $result['score'] < 0.5) {
        die("reCAPTCHA verification failed.");
    }

    if (!isset($_POST['csrf_token']) || !verify_csrf_token($_POST['csrf_token'])) {
        die("Invalid CSRF token");
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $user = loginUser($username, $password);
    if ($user) {
        $_SESSION['user_id'] = $user['id'];
        header('Location: dashboard.php');
        exit();
    } else {
        $error = "Invalid credentials.";
    }
} else {
    $csrf_token = generate_csrf_token();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/styles.css">
    <title>এপলিকেশন এ লগইন করুন</title>
    <script src="https://www.google.com/recaptcha/api.js?render=6Lfh2wAqAAAAADf28o1SW_ZSIJZGigPsF9FpUhG7"></script>
    <script>
        grecaptcha.ready(function() {
            grecaptcha.execute('6Lfh2wAqAAAAADf28o1SW_ZSIJZGigPsF9FpUhG7', {action: 'signin'}).then(function(token) {
                document.getElementById('recaptcha_token').value = token;
            });
        });
    </script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center">এপলিকেশন এ লগইন করুন</h2>
        <?php if (isset($error)) echo "<div class='alert alert-danger'>$error</div>"; ?>
        <form method="post" action="signin.php" class="w-50 mx-auto">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrf_token); ?>">
            <input type="hidden" name="recaptcha_token" id="recaptcha_token">
            <div class="form-group">
                <label for="username">ইউজারনেম</label>
                <input type="text" name="username" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="password">পাসওয়ার্ড</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
        </form>
    </div>
</body>
</html>
