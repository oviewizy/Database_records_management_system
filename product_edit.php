<?php
// product_edit.php
include 'includes/header.php';
require_once 'config/db.php';
require_once 'functions/data_functions.php';

$product = null;
if (isset($_GET['id'])) {
    $product_id = intval($_GET['id']);
    $product = getProductById($conn, $product_id);
    if (!$product) {
        $_SESSION['message'] = 'Product not found.';
        $_SESSION['message_type'] = 'danger';
        header('Location: products.php');
        exit();
    }
} else {
    $_SESSION['message'] = 'Invalid request.';
    $_SESSION['message_type'] = 'danger';
    header('Location: products.php');
    exit();
}
?>

<h2><i class="fas fa-edit"></i> Edit Product</h2>
<hr>

<form action="product_edit_process.php" method="POST">
    <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($product['product_id']); ?>">
    <div class="form-group">
        <label for="product_name">Product Name:</label>
        <input type="text" class="form-control" id="product_name" name="product_name" value="<?php echo htmlspecialchars($product['product_name']); ?>" required>
    </div>
    <div class="form-group">
        <label for="category">Category:</label>
        <input type="text" class="form-control" id="category" name="category" value="<?php echo htmlspecialchars($product['category']); ?>" required>
    </div>
    <div class="form-group">
        <label for="price">Price:</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" value="<?php echo htmlspecialchars($product['price']); ?>" required>
    </div>
    <div class="form-group">
        <label for="stock">Stock Quantity:</label>
        <input type="number" class="form-control" id="stock" name="stock" value="<?php echo htmlspecialchars($product['stock']); ?>" required>
    </div>
    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Save Changes</button>
    <a href="products.php" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Cancel</a>
</form>

<?php include 'includes/footer.php'; ?>