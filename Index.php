<?php 
require_once 'db.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- apna.email@example.com --> <!-- WARNING: Yahan apna registered email zaroor likhein! -->
    
    <div class="container">
        <h1>Product Dashboard</h1>
        <a href="add.php" class="btn">Add New Product</a>
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Price</th>
                    <th>Stock</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM products");
                $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
                
                foreach ($products as $row): 
                ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['product_name']) ?></td>
                    <td><?= htmlspecialchars($row['category']) ?></td>
                    <td>$<?= htmlspecialchars($row['price']) ?></td>
                    <td><?= htmlspecialchars($row['stock_quantity']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn-edit">Edit</a>
                        <a href="delete.php?id=<?= htmlspecialchars($row['id']) ?>" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
