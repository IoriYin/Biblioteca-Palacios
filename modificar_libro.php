<?php
session_start();
include "conexion.php";
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$isbn = $_GET['ISBN'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $editorial = $_POST['editorial'];
    $genero = $_POST['genero'];
    $copias = $_POST['copias'];

    $conexion->query("UPDATE Libro SET Titulo='$titulo', Autor='$autor', Editorial='$editorial', Genero='$genero'
                      WHERE ISBN=$isbn");

    $conexion->query("UPDATE Ejemplar SET Cantidad=$copias WHERE ISBN=$isbn");

    header("Location: libros.php");
}

$libro = $conexion->query("SELECT * FROM Libro WHERE ISBN=$isbn")->fetch_assoc();
$ejemplar = $conexion->query("SELECT Cantidad FROM Ejemplar WHERE ISBN=$isbn")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Modificar Libro</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
<?php include 'taskbar.php'; ?>
<div class="contenido">
    <h2>Modificar libro</h2>
    <form method="POST">
        <input type="text" name="titulo" value="<?php echo $libro['Titulo']; ?>" required><br>
        <input type="text" name="autor" value="<?php echo $libro['Autor']; ?>" required><br>
        <input type="text" name="editorial" value="<?php echo $libro['Editorial']; ?>" required><br>
        <input type="text" name="genero" value="<?php echo $libro['Genero']; ?>" required><br>
        <input type="number" name="copias" value="<?php echo $ejemplar['Cantidad']; ?>" required><br>
        <input type="submit" value="Guardar Cambios">
    </form>
</div>
</body>
</html>
