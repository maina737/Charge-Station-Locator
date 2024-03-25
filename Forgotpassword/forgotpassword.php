<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Process the form submission
    // (Send password reset link to the user's email address)
    // Redirect the user to a confirmation page
    header("Location: ./PasswordResetConfirmation.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" type="text/css" href="../User/UserLogin.css">
    <link rel="stylesheet" href="../index.css">
</head>
<body>
    <div class="login">
        <h1>Reset Password</h1>
        <form method="POST" action="./ForgotPassword.php">
            <label>Email</label>
            <input type="email" id="email" name="email" required>
            <input type="submit" name="reset" value="send email">
        </form>
    </div>
</body>
</html>
