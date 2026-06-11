<?php
include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$sql = "INSERT INTO contacts (name, email, message)
        VALUES ('$name', '$email', '$message')";

if(mysqli_query($conn, $sql)){
    echo "<script>
        alert('Message sent successfully!');
        window.location.href='../Frontend/contact.html';
    </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>