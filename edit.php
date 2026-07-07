<?php
require_once 'db.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    header("Location: index.php");
    exit();
}

// Fetch existing data
$stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['product_name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $stock = $_POST['stock_quantity'];

    $sql = "UPDATE products SET product_name = ?, category = ?, price = ?, stock_quantity = ? WHERE id = ?";
    $updateStmt = $pdo->prepare($sql);
    $updateStmt->execute([$name, $category, $price, $stock, $id]);

    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container form-container">
        <h2>Edit Product</h2>
        <form method="POST">
            <label>Product Name:</label>
            <input type="text" name="product_name" value="<?= htmlspecialchars($product['product_name']) ?>" required>
            
            <label>Category:</label>
            <input type="text" name="category" value="<?= htmlspecialchars($product['category']) ?>" required>
            
            <label>Price:</label>
            <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($product['price']) ?>" required>
            
            <label>Stock Quantity:</label>
            <input type="number" name="stock_quantity" value="<?= htmlspecialchars($product['stock_quantity']) ?>" required>
            
            <button type="submit" class="btn">Update Product</button>
            <a href="index.php" class="btn-cancel">Cancel</a>
        </form>
    </div>
</body>
</html>
