<?php
$host = "localhost";
$user = "dev_user";
$pass = "Italika*2026"; 
$db   = "Italikatres";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
