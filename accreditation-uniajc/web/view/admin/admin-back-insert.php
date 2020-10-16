<?php

require('../sql/connection-MySQL.php');

$conexion = conectarMySQL();

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];

$declaracionSQL = "INSERT INTO user 
VALUES ('NULL','$correo', '$password', 'Administrador', '$nombre', now(),'')";

if (!($insertar = mysqli_query($conexion, $declaracionSQL))) {
    echo "<strong>Lo sentimos, se produjo un error con los datos diligenciados.</strong><br>CAUSA: " . mysqli_error($conexion);
    exit();
} else {
    echo "Administrador registrado correctamente.
     <script>location.reload();</script>";
}


mysqli_close($conexion);
