
<?php
    session_start();

    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name = "add-station";
    $conn = new mysqli($servername, $username, $password, $db_name);
    if($conn->connect_error){
      die("Connection failed".$conn->connect_error);
    }
    echo"successful"; 


       if(!empty($username) && !empty($password) &&!is_numeric($username))
        {

            $query = "insert into owner-login (username, email, password,) values('$username', '$email', '$password')";

            mysqli_query($conn, $query);

            echo "<script type='text/javascript'>alert('Successfully Registered'); window.location='login.php'; </script>";
           /* '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline"> New record created successfully. Click <a href="login.php" class="text-blue-500">here</a> to login.</span>
          </div>';*/

        }
        else
        {
            echo"<script type='text/javascript'>alert('Please Enter Valid Information')</script>";
        }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSownerSignup</title>
    <link rel="stylesheet" type="text/css" href="CSownerSignup.css">
</head>
<body>
     <div class="signup">
        <h1>Sign Up</h1>
        <form>
            <label>Username</label>
            <input type="text" name="" required>
            <label>Email</label>
            <input type="email" name="" required>
            <label>Password</label>
            <input type="password" name="" required>
            <input type="submit" name="" value="Submit">
            
        </form>
        <p>Already have an account? <a href="#">Login</a></p>
     </div>
 </body>
 </html>