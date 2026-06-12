<?php

$host = "sql103.infinityfree.com";
$user = "if0_42169404";
$password = "Mazenomer2002";
$database = "if0_42169404_laptop_store2";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database
);

if(!$conn){
    die("Connection failed");
}

?>