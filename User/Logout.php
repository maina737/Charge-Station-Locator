
<?php

    session_destroy();
    session_start();
    $_SESSION['login'] = 'You have logged out of the system succcessfully';
    header("location:UserLogin.php");
