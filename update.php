<?php
include 'db.php';

$id = $_GET['id'];

$stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
$stmt->execute([$id]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];

    $stmt = $pdo->prepare('UPDATE products SET name = ?, description = ?, price = ? WHERE id = ?');
    $stmt->execute([$name, $description, $price, $id]);

    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= $product['name'] ?>" required><br><br>
        <label>Description:</label><br>
        <textarea name="description" required><?= $product['description'] ?></textarea><br><br>
        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" value="<?= $product['price'] ?>" required><br><br>
        <button type="submit">Update Product</button>
    </form>
</body>
</html>
