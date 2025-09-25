<?php
// customer_delete.php

session_start();
require_once 'config/db.php';
require_once 'functions/data_functions.php';

if (isset($_GET['id'])) {
    $customer_id = intval($_GET['id']);
    if (deleteCustomer($conn, $customer_id)) {
        $_SESSION['message'] = 'Customer deleted successfully!';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error deleting customer.';
        $_SESSION['message_type'] = 'danger';
    }
} else {
    $_SESSION['message'] = 'Invalid request.';
    $_SESSION['message_type'] = 'danger';
}

header('Location: customers.php');
exit();
?>