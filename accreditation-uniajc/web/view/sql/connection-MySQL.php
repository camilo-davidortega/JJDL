<?php

function conectarMySQL()
{
    $host = 'Localhost';
    $user = 'root';
    $password = '';
    $database = 'accreditation_uniajc';

    if (!($conexion = mysqli_connect($host, $user, $password, $database))) {
        echo "<strong>Lo sentimos, se produjo un error con los datos diligenciados.</strong><br>CAUSA: " . mysqli_error($conexion);
        exit();
    }

    return $conexion;
}
