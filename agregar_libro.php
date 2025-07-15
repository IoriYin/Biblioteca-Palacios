<?php
session_start();
include "conexion.php";
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $isbn = $_POST['isbn'];
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $genero = $_POST['genero'];
    $copias = $_POST['copias'];

    $conexion->query("INSERT INTO Libro (ISBN, Titulo, Autor, Editorial, Genero)
                      VALUES ($isbn, '$titulo', '$autor', '$editorial', '$genero')");

    $conexion->query("INSERT INTO Ejemplar (cod_barra, ISBN, estado, Cantidad)
                      VALUES ($isbn, $isbn, 'Disponible', $copias)");

    header("Location: libros.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Añadir Libro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<?php include 'taskbar.php'; ?>
<div class="contenido">
    <h2>Añadir nuevo libro</h2>
    <form method="POST">
        <input type="number" name="isbn" placeholder="ISBN" required><br>
        <input type="text" name="titulo" placeholder="Título" required><br>
        <input type="text" name="autor" placeholder="Autor" required><br>
        <input type="text" name="editorial" placeholder="Editorial" required><br>
        <input type="text" name="genero" placeholder="Género" required><br>
        <input type="number" name="copias" placeholder="Cantidad de copias" required><br>
        <input type="submit" value="Añadir libro">
    </form>
</div>
</body>
</html>
