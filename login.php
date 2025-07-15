<?php
session_start();
include "conexion.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['usuario'];
    $clave = $_POST['clave'];

    $stmt = $conexion->prepare("SELECT * FROM Usuario WHERE DNI = ? OR Correo = ?");
    $stmt->bind_param("is", $usuario, $usuario);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows > 0) {
        $fila = $resultado->fetch_assoc();
        if (password_verify($clave, $fila['Clave'])) {
            $_SESSION['usuario'] = $fila['Nombre'];
            header("Location: libros.php");
        } else {
            $error = "Contraseña incorrecta.";
        }
    } else {
        $error = "Usuario no encontrado.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión | Biblioteca Palacios</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<div class="contenedor">
    <h2>Iniciar Sesión</h2>
    <?php if (!empty($error)) echo "<p class='error'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="usuario" placeholder="Email o DNI" required><br>
        <input type="password" name="clave" placeholder="Contraseña" required><br>
        <input type="submit" value="Ingresar">
    </form>
    <a href="registro.php">¿No tienes cuenta? Regístrate</a>
    <a href="recuperar.php">¿Olvidaste tu contraseña?</a>
</div>
</body>
</html>
