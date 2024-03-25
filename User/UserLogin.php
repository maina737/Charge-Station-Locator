<?php
$usernameFound = $passwordFound = "";
session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require_once('../Database/functions.php');
    require_once('../Database/connection.php');

    $username = $_POST["username"];
    $password = $_POST["password"];

    $connection->select_db($database);

    $check_username = $connection->prepare("SELECT username,passd FROM `users` WHERE username=?");
    $check_username->bind_param("s", $username);

    $check_username->execute();

    $check_username_results = $check_username->get_result();

    if ($check_username_results->num_rows === 1) {
        $usernameFound = "";

        $userData = $check_username_results->fetch_assoc();
        if ($userData['passd'] === $password) {
            $passwordFound = "";
            redirect("../Homepage/Homepage.php");
        } else {
            $passwordFound = "This password is not found";
            echo "<script type='text/javascript'>alert('Password does not match')</script>";
        }
    } else {
        $usernameFound = "This username is not found";
        echo "<script type='text/javascript'>alert('Username not found')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UserLogin.php</title>
    <link rel="stylesheet" type="text/css" href="../User/UserLogin.css">
    <link rel="stylesheet" href="../index.css">
</head>

<body>
    <div class="login">
        <h1>Login</h1>
        <form method="POST" action="./UserLogin.php">
            <label>Username</label>
            <input type="text" name="username" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <input type="submit" name="login" value="LOGIN">
        </form>
        <p>Don't have an account? <a href="./UserSignup.php">Sign Up</a></p>
    </div>
</body>

</html>