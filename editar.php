<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location: login.php"); exit(); }
include 'db.php';

$id = $_GET['id'];
$res = $conn->query("SELECT * FROM refacciones WHERE id=$id");
$dato = $res->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    
    $sql = "UPDATE refacciones SET nombre='$nombre', precio='$precio' WHERE id=$id";
    if ($conn->query($sql)) {
        header("Location: admin.php");
    }
}
?>
<form method="POST">
    <h2>Editar Refacción #<?php echo $id; ?></h2>
    Nombre: <input type="text" name="nombre" value="<?php echo $dato['nombre']; ?>"><br>
    Precio: <input type="number" step="0.01" name="precio" value="<?php echo $dato['precio']; ?>"><br>
    <button type="submit">Actualizar</button>
    <a href="admin.php">Cancelar</a>
</form>
