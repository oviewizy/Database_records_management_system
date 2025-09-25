<?php
// product_delete.php
session_start();
require_once 'config/db.php';
require_once 'functions/data_functions.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    if (deleteProduct($conn, $id)) {
        $_SESSION['message'] = 'Product deleted successfully!';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error deleting product.';
        $_SESSION['message_type'] = 'danger';
    }
} else {
    $_SESSION['message'] = 'Invalid request.';
    $_SESSION['message_type'] = 'danger';
}

header('Location: products.php');
exit();
?>