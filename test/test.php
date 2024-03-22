
<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    require_once('../Database/functions.php');
    require_once('../Database/connection.php');

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $encpassword = password_hash($password, PASSWORD_DEFAULT);


    if (create_database($database, $connection)) {

        $connection->select_db($database);

        $sql_table = "CREATE TABLE IF NOT EXISTS `test`(
            username varchar(255) unique not null,
            email varchar(255) unique not null,
            passd varchar(255) unique not null
        );";

        if (mysqli_query($connection, $sql_table)) {
            $check_username = $connection->prepare("SELECT username from test WHERE username=?");
            $check_username->bind_param("s", $username);
            $check_username->execute();

            $check_username_result = $check_username->get_result();

            if ($check_username_result->num_rows > 0) {
                echo "Username is already taken";
                throw new Exception("");
            }
            $check_email = $connection->prepare("SELECT email from test WHERE email=?");
            $check_email->bind_param("s", $email);
            $check_email->execute();

            $check_email_result = $check_email->get_result();

            if ($check_email_result->num_rows > 0) {
                echo "Email is already taken";
                throw new Exception($connection->error);
            }
            $stmt_create_user = $connection->prepare("INSERT INTO `test`(username,email,passd) VALUES (?,?,?)");
            $stmt_create_user->bind_param("sss", $username, $email, $password);

            $stmt_create_user->execute();

            echo "SUCCESSFULLY REGISTERED USER";
            redirect('../User/UserLogin.php');
        }
    } else {
        echo json_encode(array("message" => "failed to connect database"));
    }
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./test.css">
    <script defer src="./test.js"></script>
</head>
<body>
    <div class="container">
        <form id="form" action="./UserSignup.php" method="POST">
            <h1>Registration</h1>
            <div class="input-control">
                <label for="username">Username</label>
                <input id="username" name="username" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="email">Email</label>
                <input id="email" name="email" type="text">
                <div class="error"></div>
            </div>
            <div class="input-control">
                <label for="password">Password</label>
                <input id="password"name="password" type="password">
                <div class="error"></div>
            </div>
           
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>