<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "laptop_store";

$conn = mysqli_connect(
    $host,
    $user,
    $password,
    $database,
    3307
);

if(!$conn){
    die("Connection failed");
}

?>