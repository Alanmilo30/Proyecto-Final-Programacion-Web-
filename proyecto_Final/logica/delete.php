<?php
include('conexion.php');

$id = $_GET['id'];
$sql = "DELETE FROM listas WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    header('Location: ../paginaPrincipal.php');
    exit();
} else {
    echo "Error: " . $conn->error;
}
?>