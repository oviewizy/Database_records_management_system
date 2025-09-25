<?php
// functions/auth_functions.php

function isAuthenticated() {
    return isset($_SESSION['user_id']);
}

function requireAuth($role = null) {
    if (!isAuthenticated()) {
        header('Location: login.php');
        exit();
    }
    if ($role !== null && $_SESSION['role'] !== $role) {
        // Redirect to a dashboard or show an error for unauthorized access
        header('Location: dashboard.php');
        exit();
    }
}
?>