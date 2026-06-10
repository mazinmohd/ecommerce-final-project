<?php

include "db.php";

$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

$cart = json_decode($_POST['cart_data'], true);

if(!$cart){
    $cart = [];
}

$total = 0;

foreach($cart as $item){
    $total += $item['price'] * $item['quantity'];
}

/* 1. Insert customer */
$customer_query = "
INSERT INTO customers(full_name, email, phone, address)
VALUES('$name','$email','$phone','$address')
";

$customer_result = mysqli_query($conn, $customer_query);

if(!$customer_result){
    die("Customer Error: " . mysqli_error($conn));
}

$customer_id = mysqli_insert_id($conn);

/* 2. Insert order */
$order_query = "
INSERT INTO orders(customer_id, total_amount)
VALUES('$customer_id','$total')
";

$order_result = mysqli_query($conn, $order_query);

if(!$order_result){
    die("Order Error: " . mysqli_error($conn));
}

header("Location: ../Frontend/order-confirmation.html");
exit;
?>