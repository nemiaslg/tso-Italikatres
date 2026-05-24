<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $desc   = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock  = $_POST['stock'];


    $sql = "INSERT INTO refacciones (nombre, descripcion, precio, stock) 
            VALUES ('$nombre', '$desc', '$precio', '$stock')";

    if ($conn->query($sql) === TRUE) {
        
        echo "<script>alert('Registro guardado exitosamente. Permiso INSERT validado.'); window.location='admin.php';</script>";
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head><meta charset="UTF-8"><title>Nueva Refacción - Italika</title></head>
<body>
    <h2>Dar de Alta Nueva Refacción</h2>
    <form method="POST">
        <input type="text" name="nombre" placeholder="Nombre de la refacción" required><br><br>
        <textarea name="descripcion" placeholder="Descripción técnica"></textarea><br><br>
        <input type="number" step="0.01" name="precio" placeholder="Precio (Ej: 85.50)" required><br><br>
        <input type="number" name="stock" placeholder="Cantidad en stock" required><br><br>
        <button type="submit">Guardar en Base de Datos</button>
        <a href="admin.php">Cancelar</a>
    </form>
</body>
</html>
