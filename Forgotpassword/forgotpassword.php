
<?php

session_start();
// include 'header.php';
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
<style>
    .row{
        width:100vw;
        height: 90vh;
    }
</style>

<div class="row d-flex justify-content-center align-items-center">
    <div style="height: 10rem;" class=" content w-25 bg-info">
        <form action="resetpasswordprocessor.php" method="post">
            <h3 class="text-center text-decoration-none">Enter your Email </h3>
            <input type="email" style=" height: 2rem;width: 100%;" name="email" placeholder="Enter email"><br><br>
            <button type="submit" class="btn btn-secondary w-100" name="forgetpassword">Click To Reset Password</button>
        </form>
    </div>

</div>



</body>
</html>
