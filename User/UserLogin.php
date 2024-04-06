 

<?php
session_start();
$usernameFound = $passwordFound = "";
// session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require_once('../Database/functions.php');
    require_once('../Database/connection.php');

    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashedPassword = md5($password);

    $connection->select_db($database);

    $check_username = $connection->prepare("SELECT username, passd FROM `csowners` WHERE username=?");
    $check_username->bind_param("s", $username);

    $check_username->execute();

    $check_username_results = $check_username->get_result();

    if ($check_username_results->num_rows === 1) {
        $usernameFound = "";

        $userData = $check_username_results->fetch_assoc();
        if ($userData['passd'] === $hashedPassword) {
            $passwordFound = "";
            // $_SESSION['userId'] = $userData['username'];
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


<?php
$usernameFound = $passwordFound = "";
// session_start();
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require_once('../Database/functions.php');
    require_once('../Database/connection.php');

    $username = $_POST["username"];
    $password = $_POST["password"];
    $hashedPassword = md5($password);

    $connection->select_db($database);

    $check_username = $connection->prepare("SELECT username, passd FROM `users` WHERE username=?");
    $check_username->bind_param("s", $username);

    $check_username->execute();

    $check_username_results = $check_username->get_result();

    if ($check_username_results->num_rows === 1) {
        $usernameFound = "";

        $userData = $check_username_results->fetch_assoc();
        if ($userData['passd'] === $hashedPassword) {
            $passwordFound = "";
            // $_SESSION['userId'] = $userData['username'];
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
        <?php
                if(isset($_SESSION['status'])){
                    ?>
                <div>
                    <h2><?php echo $_SESSION['status']; ?></h2>
                </div>
                <?php
                unset($_SESSION['status']);
                }
            ?>
        <form method="POST" action="./UserLogin.php" onsubmit="return validateForm()">
            <label>Username</label>
            <input type="text" id="username" name="username" placeholder="Enter Username" required>

            <label>Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Password" required>
            <input type="submit" name="login" value="LOGIN">
        </form>
        <p>Don't have an account? <a href="./UserSignup.php">Sign Up</a></p>
        <p>Forgot your password? <a href="../Forgotpassword/forgotpassword.php">Reset Password</a></p>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById("username").value;

            var password = document.getElementById("password").value;
            if (/^\d+$/.test(username)) {
                alert("Username cannot be numbers only");
                return false;
            }
            if (password.length < 8 || !/[A-Z]/.test(password) || !/[^A-Za-z0-9]/.test(password)) {
                alert("Password must be at least 8 characters long and contain at least one uppercase letter and one special character");
                return false;
            }

            return true;
        }
    </script>
</body>

</html>