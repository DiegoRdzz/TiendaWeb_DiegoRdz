<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $stmt = $pdo->prepare("INSERT INTO productos (nombre, descripcion, precio) VALUES (?, ?, ?)");
    $stmt->execute([$nombre, $descripcion, $precio]);

    header("Location: index.php");
    exit();
}
?>
