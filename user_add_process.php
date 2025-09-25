<?php
// user_add_process.php
session_start();
require_once 'config/db.php';
require_once 'functions/auth_functions.php';
require_once 'functions/data_functions.php'; // We might add a user-related function here later

requireAuth('admin'); // Only admins can access this script

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Hash the password for security
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute the insert statement
    $stmt = $conn->prepare("INSERT INTO users (username, password_hash, role) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $password_hash, $role);

    if ($stmt->execute()) {
        $_SESSION['message'] = 'User ' . htmlspecialchars($username) . ' created successfully!';
        $_SESSION['message_type'] = 'success';
    } else {
        $_SESSION['message'] = 'Error creating user: ' . $stmt->error;
        $_SESSION['message_type'] = 'danger';
    }
}
header('Location: users.php');
exit();
?>