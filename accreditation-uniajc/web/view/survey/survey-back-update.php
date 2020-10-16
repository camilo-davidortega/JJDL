<?php

require('../../view/sql/connection-MySQL.php');

$conexion = conectarMySQL();

$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$status = $_POST['status'];

$declaracionSQL = "UPDATE survey 
    SET title_survey='$title',  description_survey='$description', status_survey='$status' 
    WHERE id_survey='$id'
    ";
if (!($actualizar = mysqli_query($conexion, $declaracionSQL))) {
    echo "<strong>actualizar:</strong> " . mysqli_error($conexion);
    exit();
}

echo '<script>
location.href= "survey-examine.php";
</script>';


mysqli_close($conexion);
