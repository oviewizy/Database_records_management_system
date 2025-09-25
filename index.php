<?php
// index.php

session_start();

// Check if the user is already logged in
if (isset($_SESSION['user_id'])) {
    // User is logged in, redirect to the dashboard
    header('Location: dashboard.php');
    exit();
} else {
    // User is not logged in, redirect to the login page
    header('Location: login.php');
    exit();
}
?>