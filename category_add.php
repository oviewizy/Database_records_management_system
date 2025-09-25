<?php
// category_add.php
include 'includes/header.php';
require_once 'config/db.php';
?>

<h2><i class="fas fa-plus-circle"></i> Add New Category</h2>
<hr>
<form action="category_add_process.php" method="POST">
    <div class="form-group">
        <label for="category_name">Category Name:</label>
        <input type="text" class="form-control" id="category_name" name="category_name" required>
    </div>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Category</button>
    <a href="categories.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Categories</a>
</form>

<?php include 'includes/footer.php'; ?>