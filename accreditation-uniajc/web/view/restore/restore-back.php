<?php

require('..\sql\connection-MySQL.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require('controller/Exception.php');
require('controller/PHPMailer.php');
require('controller/SMTP.php');

$conexion = conectarMySQL();


function generateKey($len)
{
    $root = '0123456789abcdefghijklmnopqrstuvwxyz';
    $size = strlen($root);
    $key = '';

    for ($i = 0; $i < $len; $i++) {
        $key .= $root [rand(0, $size - 1)];
    }

    return $key;
}

$correo = $_POST['correo'];

$declaracionSQL = "SELECT *
FROM user 
WHERE email='$correo'";


if (!($consulta = mysqli_query($conexion, $declaracionSQL))) {
    echo "<strong>Lo sentimos, se produjo un error con los datos diligenciados.</strong><br>CAUSA: " . mysqli_error($conexion);
    exit();
} else {

    if ($row = mysqli_fetch_assoc($consulta)) {

        $key = generateKey(10);

        $link = hash('sha256', $key . $row['name']);

        $declaracionSQL2 = "UPDATE user 
    SET restore_pass='$link'
    WHERE email='$correo'
    ";
        mysqli_query($conexion, $declaracionSQL2);

        $mail = new PHPMailer(true);

        try {

            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'soporte.uniajc.admon@gmail.com';
            $mail->Password = 'Soporte.uniajc.admon2020';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;

            $mail->setFrom('no-reply@admon.uniajc.edu.co', 'Cuenta UNIAJC');
            $mail->addAddress($correo);

            $mail->isHTML(true);

            $subject = "Restablezca la contraseña de su cuenta de correo Institucional UNIAJC";
            $subject = utf8_decode($subject);
            $mail->Subject = $subject;

            $mail->Body = "Cordial saludo, <br>" . $row['name'] . ".<br><br>
En respuesta a su solicitud, realize los siguientes pasos:<br><br>
1. Seleccione y copie la siguiente llave:<br><br> <i>" . $link . "</i><br><br>
2. Vuelve a la p&aacute;gina de restablecimiento de contrase&ntilde;a.<br>
3. Confirme que ha sido usted el que solicit&oacute; el cambio de contraseña realizando la validación de la llave.<br>
4. Prosiga con la creaci&oacute;n de su nueva contrase&ntilde;a.<br><br>

Si no solicit&oacute; un restablecimiento de contrase&ntilde;a de la cuenta Institucional UNIAJC, puede ignorar este correo electr&oacute;nico de manera segura, sus datos están seguros.<br><br>
Por favor, no responda a este mensaje.
";

            $mail->CharSet = 'UTF-8';
            $mail->send();

            echo "<a href='confirm-key.php' style='color: white;'>Revisa tu correo y vuelve aquí cuando tengas la llave.</a>";

        } catch (Exception $e) {
            echo "El mensaje no se ha podido enviar: {$mail->ErrorInfo}";
        }

    } else {
        echo "<strong>Los datos diligenciados no se encuentran registrados en el sistema.</strong>";
        exit();
    }

}

mysqli_close($conexion);
