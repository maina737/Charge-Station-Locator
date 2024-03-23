<?php
session_start();
session_destroy();
header("Location: .././User/UserLogin.php");
exit();

?>