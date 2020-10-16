<?php

function conectarMySQL()
{
    $host = 'Localhost';
    $user = 'root';
    $password = '';
    $database = 'accreditation_uniajc';

    if (!($conexion = mysqli_connect($host, $user, $password, $database))) {
        echo "<strong>conexion:</strong> " . mysqli_connect_error();
        exit();
    }

    return $conexion;
}
