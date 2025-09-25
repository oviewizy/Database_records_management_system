<?php
// product_edit_process.php
session_start();
require_once 'config/db.php';
require_once 'functions/data_functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['product_id'];
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];

    if (updateProduct($conn, $id, $name, $category, $price, $stock)) {
        $_SESSION['message'] = 'Product updated successfully!';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error updating product.';
        $_SESSION['message_type'] = 'danger';
    }
}
header('Location: products.php');
exit();
?>