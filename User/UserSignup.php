<?php
session_start();
//if(!isset($_SESSION['id'])){
  //  redirect('');
  //  exit();
//}
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require_once('../Database/functions.php');
    require_once('../Database/connection.php');

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $hashedPassword= password_hash($password, PASSWORD_BCRYPT);
    // $hashedPassword= $password;

    if (create_database($database, $connection)) {

        $connection->select_db($database);

        $sql_table = "CREATE TABLE IF NOT EXISTS `users`(
            userId int primary key auto_increment not null,
            username varchar(255) unique not null,
            email varchar(255) unique not null,
            passd varchar(255) unique not null
        );";

        if (mysqli_query($connection, $sql_table)) {
            $check_username = $connection->prepare("SELECT username from users WHERE username=?");
            $check_username->bind_param("s", $username);
            $check_username->execute();

            $check_username_result = $check_username->get_result();

            if ($check_username_result->num_rows > 0) {
                echo "Username is already taken";
                throw new Exception("");
            }
            $check_email = $connection->prepare("SELECT email from users WHERE email=?");
            $check_email->bind_param("s", $email);
            $check_email->execute();

            $check_email_result = $check_email->get_result();

            if ($check_email_result->num_rows > 0) {
                echo "Email has already been used";
                throw new Exception($connection->error);
            }
            $stmt_create_user = $connection->prepare("INSERT INTO `users`(username,email,passd) VALUES (?,?,?)");
            $stmt_create_user->bind_param("sss", $username, $email, $hashedPassword);

            $stmt_create_user->execute();

            echo "SUCCESSFULLY REGISTERED USER";
            redirect('../User/UserLogin.php');
        }
    } else {
        echo json_encode(array("message" => "failed to connect database"));
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
    <link rel="stylesheet" type="text/css" href="./UserSignup.css">
    <link rel="stylesheet" href="../index.css">
</head>

<body>
    <div class="signup">
        <h1>Sign Up</h1>
        <form action="./UserSignup.php" method="POST">
            <label>Username</label>
            <input type="text" name="username" required>
            <label>Email</label>
            <input type="text" name="email" required>
            <label>Password</label>
            <input type="password" name="password" required>
            <input type="submit" name="signup" value="SIGNUP">
        </form>
        <p>Already have an account? <a href="./UserLogin.php">Login</a></p>
    </div>
</body>

</html>