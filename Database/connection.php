<?php
$servername="localhost";
$username="root";
$password="";

$connection=new mysqli($servername,$username,$password);
if(!$connection){
    echo json_encode(array("message"=>"failed to connect server"));
}
