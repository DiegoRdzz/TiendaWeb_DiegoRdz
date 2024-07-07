<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];

    $stmt = $pdo->prepare("UPDATE productos SET nombre = ?, descripcion = ?, precio = ? WHERE id = ?");
    $stmt->execute([$nombre, $descripcion, $precio, $id]);

    header("Location: index.php");
    exit();
}
?>
