<?php

require('../../view/sql/connection-MySQL.php');

$conexion = conectarMySQL();

$relation_survey = $_POST['relation_survey'];
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$status = $_POST['status'];
$type_question = $_POST['type_question'];

$declaracionSQL = "UPDATE question 
    SET relation_survey='$relation_survey', title_question='$title',  description_question='$description', status_question='$status', type_question='$type_question' 
    WHERE id_question='$id'
    ";
if (!($actualizar = mysqli_query($conexion, $declaracionSQL))) {
    echo "<strong>actualizar:</strong> " . mysqli_error($conexion);
    exit();
}
echo '<script>
location.href= "question.php";
</script>';


mysqli_close($conexion);
