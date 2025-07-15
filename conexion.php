<?php
$host = "localhost";
$usuario = "root";
$contrasena = ""; // tu contraseña de XAMPP si tenés, si no dejar vacío
$basedatos = "biblioteca";

$conexion = new mysqli($host, $usuario, $contrasena, $basedatos);

if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}
?>
