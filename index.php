<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Productos</title>
    <link rel="stylesheet" href="styles.css">
    <script src="alerta.js" defer></script>
</head>
<body>
    <div class="container">
        <h1>Agregar un producto</h1>
        <form action="agregar.php" method="POST">
            <label for="nombre">Nombre</label>
            <input type="text" id="nombre" name="nombre" required>
            
            <label for="descripcion">Descripción</label>
            <textarea id="descripcion" name="descripcion" required></textarea>
            
            <label for="precio">Precio</label>
            <input type="number" id="precio" name="precio" step="0.01" required>
            
            <button type="submit">Agregar producto</button>
        </form>
        
        <h1>Lista de productos agregados</h1>
        <div class="product-list">
            <?php
            $stmt = $pdo->query('SELECT * FROM productos');
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="product">';
                echo '<h2>' . htmlspecialchars($row['nombre']) . '</h2>';
                echo '<p>' . htmlspecialchars($row['descripcion']) . '</p>';
                echo '<p>$' . htmlspecialchars($row['precio']) . '</p>';
                echo '<form action="actualizar.php" method="POST">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<button type="submit">Actualizar</button>';
                echo '</form>';
                echo '<form action="eliminar.php" method="POST" onsubmit="confirmDelete(event)">';
                echo '<input type="hidden" name="id" value="' . $row['id'] . '">';
                echo '<button type="submit">Eliminar</button>';
                echo '</form>';
                echo '</div>';
            }
            ?>
        </div>
    </div>
</body>
</html>
