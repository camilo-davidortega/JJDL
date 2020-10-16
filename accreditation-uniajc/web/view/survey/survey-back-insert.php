<?php

require('../sql/connection-MySQL.php');

$conexion = conectarMySQL();

$title = $_POST['title'];
$description = $_POST['description'];

$declaracionSQL = "INSERT INTO survey 
VALUES ('NULL','$title','$description', 'on', now())";

if (!($insertar = mysqli_query($conexion, $declaracionSQL))) {
    echo "<strong>Lo sentimos, se produjo un error con los datos diligenciados.</strong><br>CAUSA: " . mysqli_error($conexion);
    exit();
} else {
    echo "Encuesta registrada exitosamente.
    <script>location.reload();</script>";

}

mysqli_close($conexion);
