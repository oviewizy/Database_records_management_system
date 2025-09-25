<?php
// settings.php

// Includes
include 'includes/header.php';
require_once 'functions/auth_functions.php';

// Only allow 'admin' role to access this page
requireAuth('admin');
?>

<div class="jumbotron">
    <h1 class="display-4"><i class="fas fa-cogs"></i> System Settings</h1>
    <p class="lead">Welcome to the administration panel.</p>
    <hr class="my-4">
    <p>This page is only accessible to users with the **`admin`** role, demonstrating the system's role-based access control.</p>
    <p>In a full-featured system, this area would contain configurations for the database, user roles, security settings, and other administrative tasks.</p>
</div>

<?php include 'includes/footer.php'; ?>