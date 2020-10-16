<?php

require('..\sql\connection-MySQL.php');

$conexion = conectarMySQL();

$key = $_POST['key'];

$declaracionSQL = "SELECT *
FROM user 
WHERE restore_pass='$key'";

if (!($consulta = mysqli_query($conexion, $declaracionSQL))) {
    echo "<strong>Lo sentimos, se produjo un error con los datos diligenciados.</strong><br>CAUSA: " . mysqli_error($conexion);
    exit();
} else {

    if ($row = mysqli_fetch_assoc($consulta)) {

        $email = $row['email'];

        $declaracionSQL2 = "UPDATE user 
    SET restore_pass=''
    WHERE email='$email'
    ";
        mysqli_query($conexion, $declaracionSQL2);

        echo '<script>
location.href= "new-pass.php?email=' . $email . '";
</script>';

    } else {
        echo "<strong>La llave diligenciada no es válida o ya fue usada, Por favor solicite una nueva llave o digite una válida.</strong>";
        exit();
    }

}

mysqli_close($conexion);
