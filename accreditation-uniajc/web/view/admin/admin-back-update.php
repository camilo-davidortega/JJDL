<?php

require('../../view/sql/connection-MySQL.php');

$conexion = conectarMySQL();

$id = $_POST['id'];
$password = $_POST['password'];
$name = $_POST['name'];
$correo = $_POST['email'];
$tipo = $_POST['type_user'];

$declaracionSQL = "UPDATE user 
    SET email='$correo',password='$password', name='$name',type_user='$tipo' 
    WHERE id_user='$id'
    ";
if (!($actualizar = mysqli_query($conexion, $declaracionSQL))) {
    echo "<strong>actualizar:</strong> " . mysqli_error($conexion);
    exit();
}
echo '<script>
location.href= "admin.php";
</script>';


mysqli_close($conexion);
