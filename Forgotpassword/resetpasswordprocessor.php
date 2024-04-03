<?php
$server="localhost";
$username_details="root";
$password="";
$db="charginStation";

$conn=new mysqli("$server","$username_details","$password","$db") or die("mysqli_error");


require '../vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
//echo "hello";

session_start();

if (isset($_POST['forgetpassword'])) {
    $email = $_POST['email'];
    $otp=rand(1000,9999);
    $checkemail="select email from users where email='$email'";
    $checkemail_run=mysqli_query($conn,$checkemail);
    $count=mysqli_num_rows($checkemail_run);
    if($count==1) {
        $name="Charging station";
        $subject="Password reset";
        $body='<div style="background-color: green;color: #ddd;padding-bottom: 1rem;padding-left: 1rem;" class="body">
                    <h1Chargee here rdering app</h1>
                    <p>We are writing this message because you requested a password reset</p>
                    <p>Your otp is '.$otp.'</p>
                     <a style="background-color: blue;color: white;text-decoration: none;padding: 0.5rem;" href="http://localhost/DUPLICATE/Forgotpassword/resetPassword.php?email='.$email.'">Click here to reset yourpassword</a>
                </div>';


        $mail=new PHPMailer(true);
//    $mail->SMTPDebug=SMTP::DEBUG_SERVER;
        $mail->isSMTP();
        $mail->SMTPAuth=true;

        $mail->Host="smtp.gmail.com";

        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;


        $mail->Username="nderituc38@gmail.com";
        $mail->Password="pwxuwrhbwghubnht";

//    $mail->setFrom($email,$name);
        $mail->addAddress($email,$name);
//        $mail->addAttachment(true);
        $mail->isHTML(true);
        $mail->Subject=$subject;
        $mail->Body=$body;
        if($mail->send()){

            $otp="update users set otp='$otp' where email='$email'";
            $otp_run=mysqli_query($conn,$otp);
            if($otp_run){
                session_start();
                $_SESSION['status'] = "Open you email and to reset the password?";
                header("Location: resetPassword.php?email=" . $email);
            }
        }
        else{
            session_start();
            $_SESSION['status'] = "Something went wrong maybe network problem try again";

            header("location:forgetpassword.php");
        }
    }
    else{
        session_start();
        $_SESSION['status'] = "Email does not exist?";

        header("location:forgetpassword.php");
    }

}
if (isset($_POST['resetpassword'])) {
    $email=$_POST['email'];
    $otp=$_POST['otp'];

    $password =md5($_POST['password']);
    $confirmpassword = md5($_POST['confirmpassword']);

    if($password !== $confirmpassword) {
        session_start();
        $_SESSION['status'] = "Password do not match?";

        header("location: resetPassword.php?email=" . $email);
    }
    else{
        $checkemail="select email from users where email='$email' and  otp='$otp'";
        $checkemail_run=mysqli_query($conn,$checkemail);
        $count=mysqli_num_rows($checkemail_run);
        if($count){
            $changepassword = "UPDATE users SET passd='$password' WHERE email='$email'";
            $changepassword_run=mysqli_query($conn,$changepassword);
            
            if($changepassword_run){
                session_start();
                $_SESSION['status'] = "Password changed successfully";
    
                header("location:../User/UserLogin.php");
            }
            else{
                session_start();
                $_SESSION['status'] = "Credentials does not match check try again to reset";
                header("location:resetpassword.php");
            }
        }
        else{
            session_start();
            $_SESSION['status'] = "invalid OTP";
            header("location: resetPassword.php?email=" . $email);
        }
       
    }

}
?>