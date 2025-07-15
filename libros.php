<?php
session_start();
include "conexion.php";
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$resultado = $conexion->query("
    SELECT Libro.ISBN, Titulo, Autor, Editorial, Genero, IFNULL(Ejemplar.Cantidad, 0) AS Copias
    FROM Libro
    LEFT JOIN Ejemplar ON Libro.ISBN = Ejemplar.ISBN
");
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
    <link rel="stylesheet" href="css/estilos.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 10px;
        }
        th {
            background: #e0e0e0;
        }
        .botones a {
            background: #43a047;
            color: white;
            padding: 6px 12px;
            text-decoration: none;
            margin-right: 5px;
            border-radius: 6px;
        }
        .botones a.eliminar {
            background: #e53935;
        }
    </style>
</head>
<body>
<?php include 'taskbar.php'; ?>
<div class="contenido">
    <h2>📚 Biblioteca</h2>
    <a href="agregar_libro.php" class="botones">➕ Añadir libro</a>
    <table>
        <tr>
            <th>ISBN</th>
            <th>Título</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Género</th>
            <th>Copias</th>
            <th>Opciones</th>
        </tr>
        <?php while($libro = $resultado->fetch_assoc()): ?>
        <tr>
            <td><?php echo $libro['ISBN']; ?></td>
            <td><?php echo $libro['Titulo']; ?></td>
            <td><?php echo $libro['Autor']; ?></td>
            <td><?php echo $libro['Editorial']; ?></td>
            <td><?php echo $libro['Genero']; ?></td>
            <td><?php echo $libro['Copias']; ?></td>
            <td class="botones">
                <a href="modificar_libro.php?ISBN=<?php echo $libro['ISBN']; ?>">Modificar</a>
                <a href="eliminar_libro.php?ISBN=<?php echo $libro['ISBN']; ?>" class="eliminar">Eliminar</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</div>
</body>
</html>
