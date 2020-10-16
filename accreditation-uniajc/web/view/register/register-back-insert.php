<?php

require('..\sql\connection-MySQL.php');

$conexion = conectarMySQL();

$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$password = $_POST['password'];
$tipo = $_POST['tipo'];
$password_confirm = $_POST['password_confirm'];

if ($password == $password_confirm) {

    $declaracionSQL = "INSERT INTO user 
VALUES ('NULL','$correo', '$password', '$tipo', '$nombre', now(),'')";

    if (!($insertar = mysqli_query($conexion, $declaracionSQL))) {
        echo "<strong>Lo sentimos, se produjo un error con los datos diligenciados.</strong><br>CAUSA: " . mysqli_error($conexion);
        exit();
    } else {
        echo "¡Felicitaciones!, " . $nombre . ", Su registro fue exitoso.";
    }


    if ($tipo == "Administrador") {

        echo '<script>
location.href= "../../view/main/admin-main.php";
</script>';
    } else if ($tipo == "Estudiante") {

        echo '<script>
location.href= "../../view/main/student-main.php?email=' . $correo . '";
</script>';
    }

} else {
    echo "<strong>Las contraseñas no coinciden, inténtalo de nuevo.</strong>";
    exit();
}

mysqli_close($conexion);
