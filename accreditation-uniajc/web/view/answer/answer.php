<?php
require('../../view/sql/connection-MySQL.php');
$conexion = conectarMySQL();
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Respuestas - Administrador | UNIAJC</title>

    <!-- Favicons -->
    <link href="../../assets/img/main/uniajc-icon.svg" rel="icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@600&family=Raleway:wght@500&display=swap"
          rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../assets/vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="../../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../../assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="../../assets/vendor/venobox/venobox.css" rel="stylesheet">
    <link href="../../assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../../assets/css/style.css?v=<?php echo time(); ?>" rel="stylesheet">

</head>

<body>

<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
        <div class="contact-info float-left">
            <i class="icofont-envelope"></i><a
                    href="mailto:tesoreria@admon.uniajc.edu.co">tesoreria@admon.uniajc.edu.co</a>
            <i class="icofont-phone"></i> Pbx 57 2 6652828
        </div>

        <div class="social-links float-right">
            <a href="https://twitter.com/UNIAJC" target="_blank" class="twitter hover-scale"><i
                        class="icofont-twitter"></i></a>
            <a href="https://www.facebook.com/UNIAJC" target="_blank" class="facebook hover-scale"><i
                        class="icofont-facebook"></i></a>
            <a href="https://www.youtube.com/user/UNIAJC" target="_blank" class="youtube hover-scale"><i
                        class="icofont-youtube"></i></a>
        </div>

    </div>
</section>

<div class="footer-top clearfix">
    <div style="background: linear-gradient(#0054c1, #001a36);" class="logo">
        <a href="../main/index.php"><img style="width: 22%;" src="../../assets/img/main/logo-white.png" alt=""
                                         class="img-fluid"></a>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header">

    <div class="container">

        <nav class="nav-menu float-right d-none d-lg-block">

            <ul>
                <li class="drop-down"><a href="../main/admin-main.php"><img class="icon-nav"
                                                                            src="../../assets/img/icons/navbar-admin/survey.svg"/>Encuestas</a>
                    <ul>
                        <li><a href="../question/question.php"><img class="icon-nav"
                                                                    src="../../assets/img/icons/navbar-admin/question.svg"/>Preguntas</a>
                        </li>
                        <li class="active"><a href="#topbar"><img class="icon-nav"
                                                                  src="../../assets/img/icons/navbar-admin/answer.svg"/>Respuestas</a>
                        </li>
                    </ul>
                </li>
                <li class="drop-down"><a href="#"><img class="icon-nav"
                                                       src="../../assets/img/icons/form/type-user.svg"/>Usuarios</a>
                    <ul>
                        <li><a href="../student/student.php"><img class="icon-nav"
                                                                  src="../../assets/img/icons/navbar-admin/student.svg"/>Estudiantes</a>
                        </li>
                        <li><a href="../admin/admin.php"><img class="icon-nav"
                                                              src="../../assets/img/icons/navbar-admin/admin.svg"/>Administradores</a>
                        </li>
                    </ul>
                </li>
                <li><a onclick="return confirm('¿Está seguro que desea realizar esta acción?');"
                       href="../main/login.php"><img class="icon-nav"
                                                     src="../../assets/img/icons/navbar-admin/exit.svg"/>Cerrar
                        Sesión</a>
                </li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

<main id="main">

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact about">
        <div class="container-main">

            <div class="col-lg-12 d-flex  justify-content-center about-content">
                <div class="row">

                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">

                        <div id="survey" class="section-title">
                            <h2><img class="icon-content hover-scale"
                                     src="../../assets/img/icons/navbar-admin/answer.svg"/>Crear una Respuesta</h2>
                        </div>

                        <form action="answer-back-insert.php" method="POST" role="form" class="php-email-form"
                              onsubmit="return confirm('¿Está seguro que desea realizar esta acción?');">

                            <div class="form-group">

                                <div class="col-lg-12 form-group">
                                    <a class="default" href="#origin"> <img
                                                class="icon-form"
                                                src="../../assets/img/icons/navbar-admin/question.svg"/>PREGUNTA DE
                                        ORIGEN:</a>
                                    <select name="destination" class="form-group">
                                        <?php
                                        $statementSQL = "SELECT id_question, title_question  
FROM question
WHERE status_question='on' ORDER BY created_date_question DESC";
                                        $query = mysqli_query($conexion, $statementSQL);

                                        while ($row = mysqli_fetch_array($query)) {
                                            echo "<option value='" . $row["id_question"] . "' >ID: "
                                                . $row["id_question"] . " - " . $row["title_question"] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <script src="http://code.jquery.com/jquery-latest.js"></script>
                                    <a class="default" href="#origin"> <img
                                                class="icon-form"
                                                src="../../assets/img/icons/navbar-admin/answer.svg"/>RESPUESTAS
                                        SUGERIDAS:</a>
                                    <select class="selectpicker">
                                        <?php
                                        $statementSQL = "SELECT DISTINCT title_answer  
FROM answer ORDER BY created_date_answer DESC";
                                        $query = mysqli_query($conexion, $statementSQL);

                                        while ($row = mysqli_fetch_array($query)) {
                                            echo "<option value='" . $row["title_answer"] . "' >" . $row["title_answer"] . "</option>";
                                        }
                                        ?>
                                        <script>
                                            $(".selectpicker").on("change", function () {
                                                $('#answer_option').val($(".selectpicker option:selected").val());
                                            });
                                        </script>
                                    </select>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <a class="default" href="#question"> <img
                                                class="icon-form"
                                                src="../../assets/img/icons/form/title.svg"/>TÍTULO DE RESPUESTA:</a>
                                    <input id="answer_option" type="text" class="form-control text-center"
                                           placeholder="answer title" name="title" data-rule="minlen:2"
                                           data-msg="Por favor, Ingresa al menos 2 caracteres"/>
                                    <div class="validate"></div>
                                </div>

                                <div class="col-lg-12 form-group">
                                    <a class="default" href="#description"> <img
                                                class="icon-form"
                                                src="../../assets/img/icons/form/description.svg"/>DESCRIPCIÓN
                                        (OPCIONAL):</a>
                                    <input type="text" class="form-control text-center"
                                           placeholder="answer description" name="description"/>
                                    <div class="validate"></div>
                                </div>

                            </div>

                            <div class="mb-3">
                                <div class="loading">Cargando</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Pregunta registrada exitosamente.</div>
                            </div>
                            <div class="text-center">
                                <button type="submit" value="Guardar" name="guardar">Registrar
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>

            <?php
            $declaracionSQL2 = "SELECT COUNT(id_answer) AS answers_created FROM answer";
            $consulta2 = mysqli_query($conexion, $declaracionSQL2);
            $fila2 = mysqli_fetch_assoc($consulta2);
            ?>

            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                <div class="section-title">
                    <h2><img class="icon-content hover-scale"
                             src="../../assets/img/icons/form/history.svg"/>Historial de Respuestas -
                        Registros: <?php echo $fila2['answers_created'] ?></h2>

                    <input class="animated fadeInUp refresh" type="button" value="Actualizar"
                           onClick="location.reload();"/>

                </div>

                <div class="col-lg-12 d-flex  justify-content-center about-content">

                    <div class="scroll-table">
                        <table id="encuesta" class="table-list">

                            <tr>
                                <th><img class="icon-nav"
                                         src="../../assets/img/icons/navbar-admin/question.svg"/>Pregunta de Origen
                                </th>
                                <th><img class="icon-nav"
                                         src="../../assets/img/icons/table/id.svg"/>ID de Respuesta
                                </th>
                                <th><img class="icon-nav"
                                         src="../../assets/img/icons/form/title.svg"/>Título
                                </th>
                                <th><img class="icon-nav"
                                         src="../../assets/img/icons/form/description.svg"/>Descripción (Opcional)
                                </th>
                                <th><img class="icon-nav"
                                         src="../../assets/img/icons/navbar/calendar.svg"/>Fecha de Creación
                                </th>
                                <th><img class="icon-nav"
                                         src="../../assets/img/icons/table/power-button.svg"/>Estado
                                    (Activa/Desactivada)
                                </th>
                                <th><img class="icon-nav"
                                         src="../../assets/img/icons/table/update.svg"/>Modificar
                                </th>
                                <th><img class="icon-nav"
                                         src="../../assets/img/icons/table/delete.svg"/>Eliminar
                                </th>
                            </tr>

                            <?php
                            $statementSQL = "SELECT * FROM answer ORDER BY created_date_answer DESC";
                            $query = mysqli_query($conexion, $statementSQL);

                            while ($row = mysqli_fetch_assoc($query)) {

                                $statementSQL2 = "SELECT id_question, title_question FROM question WHERE status_question='on'";
                                $query2 = mysqli_query($conexion, $statementSQL2);

                                $statementSQL3 = "SELECT title_question FROM question WHERE id_question='" . $row["relation_question"] . "'";
                                $query3 = mysqli_query($conexion, $statementSQL3);

                                $temp = ($row["status_answer"] == "on") ? "off" : "on";

                                setlocale(LC_ALL, "es_ES", 'Spanish_Spain', 'Spanish');
                                $date = date_create($row["created_date_answer"]);

                                echo "<tr><form method='POST' onsubmit=\"return confirm('¿Está seguro que desea realizar esta acción?');\">";
                                ?>

                                <td><select name="relation_question">
                                        <?php

                                        while ($row3 = mysqli_fetch_array($query3)) {

                                            echo "<option value='" . $row["relation_question"] . "'>ID: "
                                                . $row["relation_question"] . " - " . $row3["title_question"] . "</option>";
                                        }

                                        while ($row2 = mysqli_fetch_array($query2)) {
                                            if ($row2["id_question"] != $row["relation_question"]) {
                                                echo "<option value='" . $row2["id_question"] . "' >ID: "
                                                    . $row2["id_question"] . " - " . $row2["title_question"] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select></td>
                                <?php

                                echo "<td><input type='number' name='id' value='" . $row["id_answer"] . "' readonly='readonly'/></>
                            <td><textarea name='title'>" . $row['title_answer'] . "</textarea></td>
                            <td><textarea name='description'>" . $row['description_answer'] . "</textarea></td>
                            <td><textarea name='created_date' readonly='readonly'>" . iconv('ISO-8859-2', 'UTF-8', strftime("%A, %d de %B, %Y - ", strtotime($row["created_date_answer"]))) . date_format($date, 'h:i A') . "</textarea></td>
                            <td><select style='text-transform: uppercase' name='status_answer'>
                            <option value='" . $row["status_answer"] . "' >" . $row["status_answer"] . "</option>
                            <option value='" . $temp . "' >" . $temp . "</option>
                            </select></td>
                            ";
                                echo "
                            <td><input class='update' type='submit' onclick=\"this.form.action = 'answer-back-update.php'\" value='Modificar' /></td>
                            <td><input class='delete' type='submit' onclick=\"this.form.action = 'answer-back-delete.php'\" value='Eliminar' /></td>
                            </form></div>";
                            }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </section><!-- End Contact Us Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="container clearfix">
                <div class="logo float-left">
                    <a href="../main/index.php"><img src="../../assets/img/main/logo-white.png" alt=""
                                                     class="img-fluid"></a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-info">
                    <p>
                        Sede Principal Avenida 6N No 28N-102 A.A. 25663<br><br>
                        <strong>Pbx</strong> 57 2 6652828<br>
                        tesoreria@admon.uniajc.edu.co<br>
                    </p>
                    <div class="social-links mt-3">
                        <a href="https://twitter.com/UNIAJC" target="_blank" class="twitter hover-scale"><i
                                    class="icofont-twitter"></i></a>
                        <a href="https://www.facebook.com/UNIAJC" target="_blank" class="facebook hover-scale"><i
                                    class="icofont-facebook"></i></a>
                        <a href="https://www.youtube.com/user/UNIAJC" target="_blank" class="youtube hover-scale"><i
                                    class="icofont-youtube"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-6 footer-links">
                    <h4>Navegación</h4>
                    <ul>
                        <li class="hover-scale"><i class="bx bx-chevron-right"></i> <a
                                    href="../main/index.php">Inicio</a></li>
                        <li class="hover-scale"><i class="bx bx-chevron-right"></i> <a
                                    href="../main/accreditation.php#sistemas">Acerca
                                de</a>
                        </li>
                        <li class="hover-scale"><i class="bx bx-chevron-right"></i> <a
                                    href="../main/accreditation.php#professional">Perfiles</a>
                        </li>
                        <li class="hover-scale"><i class="bx bx-chevron-right"></i> <a
                                    href="../main/accreditation.php#formation">Objetivos</a>
                        </li>
                        <li class="hover-scale"><i class="bx bx-chevron-right"></i> <a
                                    href="../main/accreditation.php#pensum">Pensum</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Servicios</h4>
                    <ul>
                        <li class="hover-scale"><i class="bx bx-chevron-right"></i> <a
                                    href="../main/accreditation.php#salud">Salud</a>
                        </li>
                        <li class="hover-scale"><i class="bx bx-chevron-right"></i> <a
                                    href="../main/accreditation.php#cultural">Culturales</a>
                        </li>
                        <li class="hover-scale"><i class="bx bx-chevron-right"></i> <a
                                    href="../main/accreditation.php#deport">Deportivos</a>
                        </li>
                        <li class="hover-scale"><i class="bx bx-chevron-right"></i> <a
                                    href="../main/accreditation.php#deport">Recreativos</a>
                        </li>
                        <li class="hover-scale"><i class="bx bx-chevron-right"></i> <a
                                    href="../main/accreditation.php#desarrollo">Desarrollo
                                profesional</a>
                        </li>
                        <li class="hover-scale"><i class="bx bx-chevron-right"></i> <a
                                    href="../main/accreditation.php#mejoramiento">Mejoramiento
                                académico</a>
                        </li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Investigación</h4>
                    <ul>
                        <li class="hover-scale"><i class="bx bx-chevron-right"></i> <a
                                    href="../main/accreditation.php#investigation">Grupos</a>
                        </li>
                        <li class="hover-scale"><i class="bx bx-chevron-right"></i> <a
                                    href="../main/accreditation.php#investigation">Semilleros</a></li>
                        <li class="hover-scale"><i class="bx bx-chevron-right"></i> <a
                                    href="../main/accreditation.php#achievement">Logros</a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">

            <div class="uni-img">
                <div class="col-lg-12 video-box">
                    <img src="../../assets/img/main/university.jpeg" class="img-fluid" alt="">
                </div>
            </div>

            <br>
            &copy; Copyright <strong><img class="icon-nav"
                                          src="../../assets/img/main/uniajc-icon.svg"/>Institución Universitaria Antonio
                José
                Camacho</strong>. <br> Todos los
            derechos reservados.
        </div>
    </div>

</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="../../assets/vendor/jquery/jquery.min.js"></script>
<script src="../../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="../../assets/vendor/php-email-form/validate.js"></script>
<script src="../../assets/vendor/jquery-sticky/jquery.sticky.js"></script>
<script src="../../assets/vendor/venobox/venobox.min.js"></script>
<script src="../../assets/vendor/waypoints/jquery.waypoints.min.js"></script>
<script src="../../assets/vendor/counterup/counterup.min.js"></script>
<script src="../../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="../../assets/vendor/aos/aos.js"></script>

<!-- Template Main JS File -->
<script src="../../assets/js/main.js"></script>

</body>

</html>