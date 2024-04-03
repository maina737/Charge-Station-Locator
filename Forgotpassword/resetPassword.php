<?php

session_start();
//$email=$_SESSION['email'];
    $email=$_GET['email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<style>
    body{
        display: grid;
        background:#fbbddc;
        justify-content: center;
        align-items: center;
        width: 100%;
        height: 560px;
    }
    label{
        margin-bottom: 2rem;
    }
    form  input{
        margin-bottom: 2rem;
    }
</style>
<p>  <?php
    if(isset($_SESSION['status'])){
    ?>
<div>
    <h2><?php echo $_SESSION['status']; ?></h2>
</div>
<?php
unset($_SESSION['status']);
}
?>
</p>
<div class="forget">
    <form action="resetpasswordprocessor.php" method="post">
        <label for="">ENTER OTP YOU RECEIVED IN EMAIL</label><br>
        <input type="hidden" name="email" value="<?php echo $email ?>"><br>
        <label for="">OTP</label><br>
        <input type="number" name="otp" placeholder="Enter OTP"><br>
        <label for="">Enter New Password</label><br>
        <input type="password" name="password" placeholder="Enter password"><br>
        <label for="">Confirm Password</label><br>
        <input type="password" name="confirmpassword" placeholder="Enter confirmpassword"><br>
        <button type="submit" name="resetpassword">Reset Password</button>
    </form>
</div>

</body>
</html>