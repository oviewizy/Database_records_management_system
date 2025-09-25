<?php
// customer_add.php

// Includes
include 'includes/header.php';
require_once 'config/db.php';
require_once 'functions/data_functions.php';
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-plus-circle"></i> Add New Customer</h2>
    <a href="customers.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Customers</a>
</div>

<hr>

<form action="customer_add_process.php" method="POST">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required>
        </div>
        <div class="form-group col-md-6">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" required>
        </div>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email">
    </div>
    <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="tel" class="form-control" id="phone" name="phone">
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
    </div>
    
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Customer</button>
</form>

<?php include 'includes/footer.php'; ?>