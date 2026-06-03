<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';


if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM refacciones WHERE id=$id");
    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración - Italika</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #d32f2f; color: white; }
        .btn-add { background: green; color: white; padding: 10px; text-decoration: none; border-radius: 5px; }
        .btn-del { color: red; cursor: pointer; }
    </style>
</head>
<body>
    <h1> REFACCIONES NEHEMIAS</h1>
    <p>Bienvenido: <?php echo $_SESSION['user']; ?> | <a href="logout.php">Cerrar Sesión</a></p>

    <a href="crear.php" class="btn-add">+ Agregar Nueva Refacción</a>
    <br><br>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Precio</th>
            <th>Stock</th>
            <th>Acciones</th>
        </tr>
        <?php
        // R (Read): Visualizar registros (Paso 3.2)
        $resultado = $conn->query("SELECT * FROM refacciones");
        while ($fila = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?php echo $fila['id']; ?></td>
            <td><?php echo $fila['nombre']; ?></td>
            <td><?php echo $fila['descripcion']; ?></td>
            <td>$<?php echo $fila['precio']; ?></td>
            <td><?php echo $fila['stock']; ?></td>
            <td>
                <a href="editar.php?id=<?php echo $fila['id']; ?>">Editar</a> | 
                <a href="admin.php?delete=<?php echo $fila['id']; ?>" class="btn-del" onclick="return confirm('¿Seguro que deseas eliminar?')">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
