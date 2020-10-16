<?php

require('../../view/sql/connection-MySQL.php');

$conexion = conectarMySQL();

$id = $_POST['id'];

$statement = "DELETE FROM survey 
    WHERE id_survey='$id'";
$consulta = mysqli_query($conexion, $statement);

$statement2 = "SELECT id_question FROM question
    WHERE relation_survey='$id'";
$consulta2 = mysqli_query($conexion, $statement2);

while ($row = mysqli_fetch_assoc($consulta2)) {
    $statement3 = "DELETE FROM answer
WHERE relation_question='" . $row["id_question"] . "'";
    $consulta3 = mysqli_query($conexion, $statement3);
}

$statement4 = "DELETE FROM question
WHERE relation_survey='$id'";
$consulta4 = mysqli_query($conexion, $statement4);

echo '<script>
location.href= "survey-examine.php";
</script>';


mysqli_close($conexion);
