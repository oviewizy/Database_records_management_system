<?php
// functions/data_functions.php

// --- Product CRUD Functions ---

function getAllProducts($conn) {
    $sql = "SELECT * FROM products ORDER BY product_id DESC";
    $result = $conn->query($sql);
    $products = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    return $products;
}

function getProductById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function addProduct($conn, $name, $category_id, $price, $stock) {
    $stmt = $conn->prepare("INSERT INTO products (product_name, category_id, price, stock) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("sidi", $name, $category_id, $price, $stock);
    return $stmt->execute();
}

function updateProduct($conn, $id, $name, $category_id, $price, $stock) {
    $stmt = $conn->prepare("UPDATE products SET product_name = ?, category_id = ?, price = ?, stock = ? WHERE product_id = ?");
    $stmt->bind_param("sidii", $name, $category_id, $price, $stock, $id);
    return $stmt->execute();
}

function deleteProduct($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM products WHERE product_id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// --- Customer CRUD Functions ---

function getAllCustomers($conn) {
    $sql = "SELECT * FROM customers ORDER BY customer_id DESC";
    $result = $conn->query($sql);
    $customers = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $customers[] = $row;
        }
    }
    return $customers;
}

function getCustomerById($conn, $id) {
    $stmt = $conn->prepare("SELECT * FROM customers WHERE customer_id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}

function addCustomer($conn, $firstName, $lastName, $email, $phone, $address) {
    $stmt = $conn->prepare("INSERT INTO customers (first_name, last_name, email, phone_number, address) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $email, $phone, $address);
    return $stmt->execute();
}

function updateCustomer($conn, $id, $firstName, $lastName, $email, $phone, $address) {
    $stmt = $conn->prepare("UPDATE customers SET first_name = ?, last_name = ?, email = ?, phone_number = ?, address = ? WHERE customer_id = ?");
    $stmt->bind_param("sssssi", $firstName, $lastName, $email, $phone, $address, $id);
    return $stmt->execute();
}

function deleteCustomer($conn, $id) {
    $stmt = $conn->prepare("DELETE FROM customers WHERE customer_id = ?");
    $stmt->bind_param("i", $id);
    return $stmt->execute();
}

// --- Category CRUD Functions ---

function getAllCategories($conn) {
    $sql = "SELECT * FROM categories ORDER BY category_name ASC";
    $result = $conn->query($sql);
    $categories = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $categories[] = $row;
        }
    }
    return $categories;
}

function addCategory($conn, $category_name) {
    $stmt = $conn->prepare("INSERT INTO categories (category_name) VALUES (?)");
    $stmt->bind_param("s", $category_name);
    return $stmt->execute();
}

// --- Updated Product Functions ---

function getAllProductsWithCategory($conn) {
    // Change JOIN to LEFT JOIN to include products without a category
    $sql = "SELECT p.*, c.category_name FROM products p LEFT JOIN categories c ON p.category_id = c.category_id ORDER BY p.product_id DESC";
    $result = $conn->query($sql);
    $products = [];
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }
    return $products;
}

?>