<?php
session_start();
include "conexion.php";
if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit();
}

$isbn = $_GET['ISBN'];

$stmt = $conexion->prepare("DELETE FROM Libro WHERE ISBN=?");
$stmt->bind_param("i", $isbn);

if ($stmt->execute()) {
    header("Location: libros.php");
} else {
    echo "Error al eliminar libro: " . $stmt->error;
}
?>
