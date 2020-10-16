<?php

require('../../view/sql/connection-MySQL.php');

$conexion = conectarMySQL();

$id = $_POST['id'];

$statement = "DELETE FROM answer 
    WHERE id_answer='$id'";
$consulta = mysqli_query($conexion, $statement);

echo '<script>
location.href= "answer.php";
</script>';


mysqli_close($conexion);
