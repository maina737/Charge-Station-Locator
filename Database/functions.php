<?php

$database="charginStation";

function create_database($database,$connection){
    $sql_create_database="CREATE DATABASE IF NOT EXISTS {$database}";

    if(!mysqli_query($connection,$sql_create_database)){
        return false;
    }
    return true;
}

function redirect($url){

    return header("Location:$url");

}

