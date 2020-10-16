<?php

require('../../view/sql/connection-MySQL.php');

$conexion = conectarMySQL();

$title = $_GET["title"];
$id_survey = $_GET["id_survey"];
$id_question = $_GET["id_question"];

$email = $_GET["email"];

$id_abierta = $_POST["id_abierta"];

$statement = "SELECT * FROM user 
    WHERE email='$email'";
$consulta = mysqli_query($conexion, $statement);

$row = mysqli_fetch_assoc($consulta);
$id_user = $row["id_user"];


if (!empty($_POST["unica"])) {

    $unica = $_POST["unica"];

    $statement2 = "INSERT INTO relation_answer_user 
   VALUES ('$id_user', '$unica', '$id_question', '$id_survey','NULL')";

    if (!($consulta2 = mysqli_query($conexion, $statement2))) {
        echo "<strong>insertar:</strong> " . mysqli_error($conexion);
        exit();
    } else {
        echo "Respuesta registrada correctamente.
        <script>location.reload();</script>";
    }
} elseif (!empty($_POST["multiple"])) {

    $count = count($_POST["multiple"]);

    foreach ($_POST["multiple"] as $multiple) {

        $statement3 = "INSERT INTO relation_answer_user 
    VALUES ('$id_user', '$multiple', '$id_question', '$id_survey', 'NULL')";

        if (!($consulta3 = mysqli_query($conexion, $statement3))) {
            echo "<strong>insertar:</strong> " . mysqli_error($conexion);
            exit();
        }
    }
    echo "Respuesta registrada correctamente.
    <script>location.reload();</script>";
} elseif (!empty($_POST["abierta"])) {

    $abierta = $_POST["abierta"];

    $statement4 = "INSERT INTO relation_answer_user 
    VALUES ('$id_user', '$id_abierta', '$id_question', '$id_survey', '$abierta')";

    if (!($consulta4 = mysqli_query($conexion, $statement4))) {
        echo "<strong>insertar:</strong> " . mysqli_error($conexion);
        exit();
    } else {
        echo "Respuesta registrada correctamente.
        <script>location.reload();</script>";
    }
} elseif (!empty($_POST["lista"])) {

    $lista = $_POST["lista"];

    $statement5 = "INSERT INTO relation_answer_user 
    VALUES ('$id_user', '$lista', '$id_question', '$id_survey', 'NULL')";

    if (!($consulta5 = mysqli_query($conexion, $statement5))) {
        echo "<strong>insertar:</strong> " . mysqli_error($conexion);
        exit();
    } else {
        echo "Respuesta registrada correctamente.
        <script>location.reload();</script>";
    }
}


echo '<script>
location.href= "student-question.php?email=' . $email . '&id_survey=' . $id_survey . '&title=' . $title . '"";
</script>';


mysqli_close($conexion);
