<?php

require('../../view/sql/connection-MySQL.php');

$conexion = conectarMySQL();

$id = $_POST['id'];

$statement = "DELETE FROM user 
    WHERE id_user='$id'";
$consulta = mysqli_query($conexion, $statement);

echo '<script>
location.href= "admin.php";
</script>';


mysqli_close($conexion);
