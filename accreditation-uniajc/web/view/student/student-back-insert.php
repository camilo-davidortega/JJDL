<?php

require('../../view/sql/connection-MySQL.php');

$conexion = conectarMySQL();

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];

$declaracionSQL = "INSERT INTO user 
VALUES ('NULL','$correo', '$password', 'Estudiante', '$nombre', now(),'')";

if (!($insertar = mysqli_query($conexion, $declaracionSQL))) {
    echo "<strong>insertar:</strong> " . mysqli_error($conexion);
    exit();
} else {
    echo "Estudiante registrado correctamente.
     <script>location.reload();</script>";
}


mysqli_close($conexion);
