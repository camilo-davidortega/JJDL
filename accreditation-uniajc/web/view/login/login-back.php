<?php

require('../../view/sql/connection-MySQL.php');

$conexion = conectarMySQL();

$correo = $_POST['correo'];
$password = $_POST['password'];

    $declaracionSQL = "SELECT *
FROM user 
WHERE email='$correo' AND password='$password'";

    $consulta = mysqli_query($conexion, $declaracionSQL);

    if ($row = mysqli_fetch_assoc($consulta)) {

        $tipo = $row["type_user"];

        if ($tipo == "Administrador") {

            echo '<script>
location.href= "admin-main.php";
</script>';
        } else if ($tipo == "Estudiante") {

            echo '<script>
location.href= "student-main.php?email=' . $correo . '";
</script>';
        }
    } else {
        echo "<strong>Los datos diligenciados no se encuentran registrados en el sistema.</strong>";
        exit();
    }



mysqli_close($conexion);
