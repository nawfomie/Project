<?php
session_start();
$code_error = '';
$success_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $entered_code = trim($_POST['verification_code']);

    // Check if the entered code matches the stored code
    if (empty($entered_code)) {
        $code_error = "Please enter the code.";
    } elseif ($entered_code != $_SESSION['verification_code']) {
        $code_error = "Invalid verification code.";
    } else {
        // Code is valid, proceed to reset password
        $success_message = "Code verified successfully. <a href='reset_password.php'>Reset your password here</a>";
        unset($_SESSION['verification_code']); // Clear the code from session
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Code</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container my-5">
        <h2>Verify Code</h2>
        <?php if ($code_error): ?>
            <div class="alert alert-danger"><?php echo $code_error; ?></div>
        <?php elseif ($success_message): ?>
            <div class="alert alert-success"><?php echo $success_message; ?></div>
        <?php endif; ?>

        <!-- Form for entering verification code -->
        <form method="post" action="verify_code.php">
            <div class="mb-3">
                <label for="verification_code" class="form-label">Enter the verification code:</label>
                <input type="text" class="form-control" id="verification_code" name="verification_code" placeholder="Verification Code" required>
            </div>
            <button type="submit" class="btn btn-primary">Verify Code</button>
        </form>

        <br>
        <a href="forgot_password.php" class="btn btn-link">Resend Code</a>
    </div>
</body>
</html>
