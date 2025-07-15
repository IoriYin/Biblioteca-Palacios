<?php
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $clave = password_hash($_POST['clave'], PASSWORD_DEFAULT);

    $stmt = $conexion->prepare("INSERT INTO Usuario (DNI, Nombre, Telefono, Correo, Clave) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("isiss", $dni, $nombre, $telefono, $correo, $clave);

    if ($stmt->execute()) {
        header("Location: login.php");
    } else {
        echo "Error al registrar: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro | Biblioteca Palacios</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="contenedor">
    <h2>Registro de Usuario</h2>
    <form method="POST">
        <input type="number" name="dni" placeholder="DNI (sin puntos)" required><br>
        <input type="text" name="nombre" placeholder="Nombre y Apellido" required><br>
        <input type="number" name="telefono" placeholder="Teléfono" required><br>
        <input type="email" name="correo" placeholder="Correo" required><br>
        <input type="password" name="clave" placeholder="Contraseña" required><br>
        <input type="submit" value="Enviar">
    </form>
    <a href="login.php">¿Ya tienes cuenta? Inicia sesión</a>
</div>
</body>
</html>
