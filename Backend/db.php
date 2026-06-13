<?php

$host = "db";
$user = "root";
$password = "root";
$database = "laptop_store2";

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