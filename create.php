<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $pdo->prepare('INSERT INTO products (name, description, price) VALUES (?, ?, ?)');
    $stmt->execute([$name, $description, $price]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br><br>
        <label>Description:</label><br>
        <textarea name="description" required></textarea><br><br>
        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" required><br><br>
        <button type="submit">Add Product</button>
    </form>
</body>
</html>
