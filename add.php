<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock_quantity'];

    $sql = "INSERT INTO products (product_name, category, price, stock_quantity) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $category, $price, $stock]);

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container form-container">
        <h2>Add New Product</h2>
        <form method="POST">
            <label>Product Name:</label>
            <input type="text" name="product_name" required>
            
            <label>Category:</label>
            <input type="text" name="category" required>
            
            <label>Price:</label>
            <input type="number" step="0.01" name="price" required>
            
            <label>Stock Quantity:</label>
            <input type="number" name="stock_quantity" required>
            
            <button type="submit" class="btn">Save Product</button>
            <a href="index.php" class="btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>
