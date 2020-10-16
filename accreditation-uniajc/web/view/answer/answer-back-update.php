<?php

require('../../view/sql/connection-MySQL.php');

$conexion = conectarMySQL();

$relation_question = $_POST['relation_question'];
$id = $_POST['id'];
$title = $_POST['title'];
$description = $_POST['description'];
$status_answer = $_POST['status_answer'];

$declaracionSQL = "UPDATE answer 
    SET relation_question='$relation_question', title_answer='$title',  description_answer='$description', status_answer='$status_answer' 
    WHERE id_answer='$id'
    ";
if (!($actualizar = mysqli_query($conexion, $declaracionSQL))) {
    echo "<strong>actualizar:</strong> " . mysqli_error($conexion);
    exit();
}
echo '<script>
location.href= "answer.php";
</script>';


mysqli_close($conexion);
