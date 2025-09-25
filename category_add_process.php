<?php
// category_add_process.php
session_start();
require_once 'config/db.php';
require_once 'functions/data_functions.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category_name = $_POST['category_name'];

    if (addCategory($conn, $category_name)) {
        $_SESSION['message'] = 'Category added successfully!';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error adding category.';
        $_SESSION['message_type'] = 'danger';
    }
}
header('Location: categories.php');
exit();
?>