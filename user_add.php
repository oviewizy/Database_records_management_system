<?php
// user_add.php
include 'includes/header.php';
require_once 'functions/auth_functions.php';
require_once 'config/db.php';

requireAuth('admin'); // Only admins can access this page
?>

<h2><i class="fas fa-user-plus"></i> Add New User</h2>
<hr>

<form action="user_add_process.php" method="POST">
    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control" id="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="role">Role:</label>
        <select class="form-control" id="role" name="role">
            <option value="user">User</option>
            <option value="admin">Admin</option>
        </select>
    </div>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Create User</button>
    <a href="users.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancel</a>
</form>

<?php include 'includes/footer.php'; ?>