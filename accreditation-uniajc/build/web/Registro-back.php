<?php

require('ConectarMySQL.php');

$conexion = conectarMySQL();

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$tipo = $_POST['tipo'];

$declaracionSQL = "INSERT INTO user 
VALUES ('$correo', '$password', '$nombre', '$tipo')";

if (!($insertar = mysqli_query($conexion, $declaracionSQL))) {
    echo "<strong>insertar:</strong> " . mysqli_error($conexion);
    exit();
}else{
    echo "Registrado correctamente";
}


mysqli_close($conexion);
