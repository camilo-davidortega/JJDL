<?php

require('../sql/connection-MySQL.php');

$conexion = conectarMySQL();

$destination = $_POST['destination'];
$title = $_POST['title'];
$description = $_POST['description'];
$type = $_POST['type'];

$declaracionSQL = "INSERT INTO question 
VALUES ('NULL', '$destination', '$title', '$description', '$type', 'on', now())";

if (!($insertar = mysqli_query($conexion, $declaracionSQL))) {
    echo "<strong>insertar:</strong> " . mysqli_error($conexion);
    exit();
} else {
    echo "Pregunta registrada exitosamente.
    <script>location.reload();</script>";
}

mysqli_close($conexion);
