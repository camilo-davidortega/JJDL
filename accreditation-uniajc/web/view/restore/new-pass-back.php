<?php

require('..\sql\connection-MySQL.php');

$conexion = conectarMySQL();

$correo = $_POST['correo'];
$password = $_POST['password'];
$password_confirm = $_POST['password_confirm'];

if ($password == $password_confirm) {

    $declaracionSQL = "UPDATE user 
    SET password='$password' 
    WHERE email='$correo'
    ";

    if (!($insertar = mysqli_query($conexion, $declaracionSQL))) {
        echo "<strong>Lo sentimos, se produjo un error con los datos diligenciados.</strong><br>CAUSA: " . mysqli_error($conexion);
        exit();
    } else {

        $declaracionSQL2 = "SELECT *
FROM user 
WHERE email='$correo' AND password='$password'";

        $consulta = mysqli_query($conexion, $declaracionSQL2);

        if ($row = mysqli_fetch_assoc($consulta)) {

            $nombre = $row['name'];
            $tipo = $row['type_user'];

            echo "¡Felicitaciones!, " . $nombre . ", Su contraseña se actualizó con exito.";

            if ($tipo == "Administrador") {

                echo '<script>
location.href= "../../view/main/admin-main.php";
</script>';
            } else if ($tipo == "Estudiante") {

                echo '<script>
location.href= "../../view/main/student-main.php?email=' . $correo . '";
</script>';
            }

        }

    }

} else {
    echo "<strong>Las contraseñas no coinciden, inténtalo de nuevo.</strong>";
    exit();
}

mysqli_close($conexion);
