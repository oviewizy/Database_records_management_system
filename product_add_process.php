<?php
// product_add_process.php

session_start();
require_once 'config/db.php';
require_once 'functions/data_functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_name = $_POST['product_name'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    
    // Corrected: Use the 'category_id' from the form
    $category_id = $_POST['category_id'];
    
    // Validate that category_id is an integer to prevent SQL injection and errors
    if (is_numeric($category_id)) {
        if (addProduct($conn, $product_name, $category_id, $price, $stock)) {
            $_SESSION['message'] = 'Product added successfully!';
            $_SESSION['message_type'] = 'success';
        } else {
            $_SESSION['message'] = 'Error adding product.';
            $_SESSION['message_type'] = 'danger';
        }
    } else {
        $_SESSION['message'] = 'Invalid category selected.';
        $_SESSION['message_type'] = 'danger';
    }
}

header('Location: products.php');
exit();
?>