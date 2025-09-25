<?php
// product_add.php

include 'includes/header.php';
require_once 'config/db.php';
require_once 'functions/data_functions.php';

$categories = getAllCategories($conn);
?>

<h2><i class="fas fa-plus-circle"></i> Add New Product</h2>
<hr>

<form action="product_add_process.php" method="POST">
    <div class="form-group">
        <label for="product_name">Product Name:</label>
        <input type="text" class="form-control" id="product_name" name="product_name" required>
    </div>
    <div class="form-group">
        <label for="category_id">Category:</label>
        <select class="form-control" id="category_id" name="category_id" required>
            <option value="">Select a category</option>
            <?php foreach ($categories as $category): ?>
                <option value="<?php echo htmlspecialchars($category['category_id']); ?>">
                    <?php echo htmlspecialchars($category['category_name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required>
    </div>
    <div class="form-group">
        <label for="stock">Stock Quantity:</label>
        <input type="number" class="form-control" id="stock" name="stock" required>
    </div>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Product</button>
    <a href="products.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Back to Products</a>
</form>

<?php include 'includes/footer.php'; ?>