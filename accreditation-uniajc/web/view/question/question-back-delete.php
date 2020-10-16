<?php

require('../../view/sql/connection-MySQL.php');

$conexion = conectarMySQL();

$id = $_POST['id'];

$statement = "DELETE FROM question 
    WHERE id_question='$id'";
$consulta = mysqli_query($conexion, $statement);

$statement2 = "DELETE FROM answer
WHERE relation_question='$id'";
$consulta2 = mysqli_query($conexion, $statement2);

echo '<script>
location.href= "question.php";
</script>';


mysqli_close($conexion);
