<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass  = $_POST['password'];

 
    if ($email == "24160676@itoaxaca.edu.mx" && $pass == "24160676TSO") {
        $_SESSION['user'] = $email;
        header("Location: admin.php");
        exit();
    } else {
        echo "<script>alert('Credenciales Incorrectas'); window.location='login.php';</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Login - Italika</title>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Acceso al Sistema Administrativo nehemias</h2>
    <form method="POST">
        <input type="email" name="email" placeholder="tunumcontrol@itoaxaca.edu.mx" required>
        <br><br>
        <input type="password" name="password" placeholder="Contraseña" required>
        <br><br>
        <button type="submit">Entrar</button>
    </form>
</body>
</html>
