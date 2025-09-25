<?php
// customer_edit.php

include 'includes/header.php';
require_once 'config/db.php';
require_once 'functions/data_functions.php';

$customer = null;
if (isset($_GET['id'])) {
    $customer_id = intval($_GET['id']);
    $customer = getCustomerById($conn, $customer_id);
    if (!$customer) {
        $_SESSION['message'] = 'Customer not found.';
        $_SESSION['message_type'] = 'danger';
        header('Location: customers.php');
        exit();
    }
} else {
    $_SESSION['message'] = 'Invalid request.';
    $_SESSION['message_type'] = 'danger';
    header('Location: customers.php');
    exit();
}
?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2><i class="fas fa-edit"></i> Edit Customer</h2>
    <a href="customers.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Customers</a>
</div>

<hr>

<form action="customer_edit_process.php" method="POST">
    <input type="hidden" name="customer_id" value="<?php echo htmlspecialchars($customer['customer_id']); ?>">
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for="first_name">First Name:</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="<?php echo htmlspecialchars($customer['first_name']); ?>" required>
        </div>
        <div class="form-group col-md-6">
            <label for="last_name">Last Name:</label>
            <input type="text" class="form-control" id="last_name" name="last_name" value="<?php echo htmlspecialchars($customer['last_name']); ?>" required>
        </div>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="<?php echo htmlspecialchars($customer['email']); ?>">
    </div>
    <div class="form-group">
        <label for="phone">Phone Number:</label>
        <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($customer['phone_number']); ?>">
    </div>
    <div class="form-group">
        <label for="address">Address:</label>
        <textarea class="form-control" id="address" name="address" rows="3"><?php echo htmlspecialchars($customer['address']); ?></textarea>
    </div>
    
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Changes</button>
</form>

<?php include 'includes/footer.php'; ?>