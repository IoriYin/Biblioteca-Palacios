<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel | Biblioteca Palacios</title>
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }
        .sidebar {
            background: #2e7d32;
            color: #fff;
            width: 220px;
            height: 100vh;
            position: fixed;
            padding: 20px;
        }
        .sidebar a {
            display: block;
            color: white;
            text-decoration: none;
            margin: 12px 0;
            padding: 8px 12px;
            background: #43a047;
            border-radius: 8px;
        }
        .sidebar a:hover {
            background: #66bb6a;
        }
        .contenido {
            margin-left: 240px;
            padding: 20px;
        }
        h2 {
            color: #2e7d32;
        }
        .configuracion-vacia {
            background: #ccc;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 15px;
            color: #555;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>Biblioteca Palacios</h2>
    <p><b><?php echo $_SESSION['usuario']; ?></b></p>
    <a href="libros.php">📚 Biblioteca</a>
    <a href="reservas.php">📖 Reservas</a>
    <a class="configuracion.php">⚙️ Configuración</a>
    <a href="usuarios.php">👥 Usuarios</a>
    <a href="cerrar_sesion.php">🔒 Cerrar sesión</a>
</div>

<div class="contenido">
    <h2>Bienvenido al panel, <?php echo $_SESSION['usuario']; ?> 📖</h2>
    <p>Selecciona una opción desde el menú lateral izquierdo para gestionar el sistema.</p>
</div>

</body>
</html>
