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
    <title>Configuración</title>
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        .contenido {
            margin-left: 240px;
            padding: 20px;
        }
    </style>
</head>
<body>

<?php include 'taskbar.php'; ?>

<div class="contenido">
    <h2>Configuración ⚙️</h2>
    <p>Sin contenido disponible.</p>
</div>

</body>
</html>
