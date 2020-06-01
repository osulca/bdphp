<?php
include 'conexion.php';

$id = $_GET["id"];
$sql = "DELETE FROM estudiantes WHERE id=$id";
$resultado = $conn->exec($sql);
header("location: index.php");