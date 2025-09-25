<?php
// customer_edit_process.php

session_start();
require_once 'config/db.php';
require_once 'functions/data_functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_id = $_POST['customer_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];

    if (updateCustomer($conn, $customer_id, $first_name, $last_name, $email, $phone, $address)) {
        $_SESSION['message'] = 'Customer updated successfully!';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error updating customer.';
        $_SESSION['message_type'] = 'danger';
    }
}
header('Location: customers.php');
exit();
?>