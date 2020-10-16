<?php

require('ConectarMySQL.php');

$conexion = conectarMySQL();

$correo = $_POST['correo'];
$password = $_POST['password'];
$tipo = $_POST['tipo'];

$declaracionSQL = "SELECT email, password, type 
FROM user 
WHERE email='$correo' AND password='$password' AND type='$tipo'";

$consulta = mysqli_query($conexion, $declaracionSQL);

if (mysqli_num_rows($consulta) == 1) {
    if ($tipo == "Administrador") {

    echo '<script>
window.open("admin.html","_blank");
location.href= "admin.html";
</script>';

    } else {

    echo '<script>
window.open("estudent.html","_blank");
location.href= "estudent.html";
</script>';

    }
} else {
    echo "<strong>Los datos diligenciados no se encuentran registrados en el sistema.</strong>";
    exit();
}

mysqli_close($conexion);
