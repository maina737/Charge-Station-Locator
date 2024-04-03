<?php
$server="localhost";
$username_details="root";
$password="";
$db="charginStation";

$conn=new mysqli("$server","$username_details","$password","$db") or die("mysqli_error");


if(isset($_POST["feedback"])) {
    // require_once('../Database/functions.php');
    // require_once('../Database/connection.php');

    session_start();
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];  

        // SQL query to insert data into table
        $sql = "INSERT INTO contact (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";
        $sqlrun = mysqli_query($conn, $sql);
        if ($sqlrun){
            echo "<script>alert('success')</script>";
            $_SESSION['status'] = 'Feed Added successfully';
            // header("location:media.php");
            // die();
        }

} 


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="contact.css">
    <title>Contact Us</title>
</head>

<body>
<?php
    if(isset($_SESSION['status'])){
        ?>
        <div>
            <p class="text-white text-uppercase bg-success p-2"><?php echo $_SESSION['status']; ?></p>
        </div>
        <?php
        unset($_SESSION['status']);
    }
    ?>
    <h1>Contact Us</h1>
    <form action="contact.php" method="post">
        <label for="name">Your Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Your Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="email">Subject:</label><br>
        <input type="text" id="subject" name="subject" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" required></textarea><br><br>

        <input type="submit" name="feedback" value="Submit">
    </form>
</body>

</html>