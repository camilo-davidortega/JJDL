<?php

require('../../view/sql/connection-MySQL.php');

$conexion = conectarMySQL();

$destination = $_POST['destination'];
$title = $_POST['title'];
$description = $_POST['description'];

$declaracionSQL = "INSERT INTO answer 
VALUES ('NULL', '$destination', '$title', '$description', 'on', now())";

if (!($insertar = mysqli_query($conexion, $declaracionSQL))) {
    echo "<strong>insertar:</strong> " . mysqli_error($conexion);
    exit();
} else {
    echo "Respuesta registrada exitosamente.
    <script>location.reload();</script>";
}

mysqli_close($conexion);
