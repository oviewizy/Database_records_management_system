<?php
// customer_add_process.php

session_start();
require_once 'config/db.php';
require_once 'functions/data_functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if (addCustomer($conn, $first_name, $last_name, $email, $phone, $address)) {
        $_SESSION['message'] = 'Customer added successfully!';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error adding customer.';
        $_SESSION['message_type'] = 'danger';
    }
}
header('Location: customers.php');
exit();
?>