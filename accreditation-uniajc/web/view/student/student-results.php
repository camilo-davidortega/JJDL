<?php
require('../../view/sql/connection-MySQL.php');
$conexion = conectarMySQL();
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Resultados - Estudiante | UNIAJC</title>
    <link href="../../assets/img/main/uniajc-icon.svg" rel="icon">

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

    <!-- Library SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

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
                <?php
                $email = $_GET["email"];
                $name = $_GET["name"];
                ?>
                <li><a href="student-examine.php?email=<?php echo $email . "&name=" . $name ?>"><img
                                class="icon-nav"
                                src="../../assets/img/icons/navbar-admin/return.svg"/>Volver</a>
                </li>
                <li><a onclick="return confirm('¿Está seguro que desea realizar esta acción?');"
                       href="../main/login.php"><img class="icon-nav"
                                                     src="../../assets/img/icons/navbar-admin/exit.svg"/>Cerrar
                        Sesión</a></li>
            </ul>
        </nav><!-- .nav-menu -->

    </div>
</header><!-- End Header -->

<main id="main">

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact about">
        <div class="container-main">

            <?php

            $get_user = "SELECT * FROM user WHERE email='" . $_GET["email"] . "'";
            $con_user = mysqli_query($conexion, $get_user);
            $result_user = mysqli_fetch_assoc($con_user);

            $count_question_relation = "SELECT COUNT(DISTINCT id_question) AS question_missing 
FROM relation_answer_user
WHERE id_user='" . $result_user["id_user"] . "' AND id_survey='" . $_GET["id_survey"] . "'";
            $con_count_question_relation = mysqli_query($conexion, $count_question_relation);

            if (mysqli_num_rows($con_count_question_relation) >= 1) {

                $result_count_question_relation = mysqli_fetch_assoc($con_count_question_relation);

                $answered = $result_count_question_relation['question_missing'];

            }

            ?>

            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">

                <?php
                $get_survey = "SELECT * FROM survey WHERE id_survey='" . $_GET["id_survey"] . "'";
                $con_survey = mysqli_query($conexion, $get_survey);
                $result_survey = mysqli_fetch_assoc($con_survey);
                ?>

                <div id="survey" class="section-title">
                    <h2><img class="icon-content hover-scale"
                             src="../../assets/img/icons/navbar-admin/survey.svg"/>Encuesta</h2>
                    <h3><?php echo $_POST["title"] ?></h3><br>
                    <h5 style="font-style: italic"><?php echo $result_survey["description_survey"] ?></h5><br><br>
                    <h2><img class="icon-content hover-scale"
                             src="../../assets/img/icons/navbar-admin/answer.svg"/>Resultados de Estudiante -
                        Respuestas: <?php echo $answered ?><br>
                    </h2>

                    <input class="animated fadeInUp refresh" type="button" value="Actualizar"
                           onClick="location.reload();"/>

                </div>
            </div>

            <div class="col-lg-12 d-flex  justify-content-center about-content">
                <div class="row">


                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">

                        <?php

                        $get_relation_answer_user = "SELECT * 
FROM relation_answer_user 
WHERE id_user='" . $result_user["id_user"] . "' AND id_survey='" . $result_survey["id_survey"] . "'";
                        $con_relation_answer_user = mysqli_query($conexion, $get_relation_answer_user);

                        if (mysqli_num_rows($con_relation_answer_user) >= 1) {

                            $get_question = "SELECT * FROM question 
                                WHERE id_question IN (";

                            while ($result_relation_answer_user = mysqli_fetch_assoc($con_relation_answer_user)) {

                                $get_question .= "'" . $result_relation_answer_user["id_question"] . "',";
                            }
                            $delete_end_comma = trim($get_question, ',');
                            $delete_end_comma .= ")";

                            $con_question = mysqli_query($conexion, $delete_end_comma);

                            $get_relation_answer_user2 = "SELECT * 
FROM relation_answer_user 
WHERE id_user='" . $result_user["id_user"] . "' AND id_survey='" . $result_survey["id_survey"] . "'";
                            $con_relation_answer_user2 = mysqli_query($conexion, $get_relation_answer_user2);

                            $get_answer = "SELECT * FROM answer 
                                WHERE id_answer IN (";

                            while ($result_relation_answer_user2 = mysqli_fetch_assoc($con_relation_answer_user2)) {

                                $get_answer .= "'" . $result_relation_answer_user2["id_answer"] . "',";
                            }
                            $delete_end_comma_answer = trim($get_answer, ',');
                            $delete_end_comma_answer .= ")";

                            $con_answer = mysqli_query($conexion, $delete_end_comma_answer);

                            $count_question = 1;
                            while ($result_question = mysqli_fetch_assoc($con_question)) {

                                echo "<form role='form' class='php-email-form'>";

                                echo '
                    <h5 style="text-align: center"><img class="icon-form"
                             src="../../assets/img/icons/navbar-admin/question.svg"/>Pregunta: ' . $count_question . ' de ' . $answered . '<br>
                    </h5>
                 <h5 class="title"><a style="cursor: default" href="#question">' . $result_question["title_question"] . '</a></h5>
                <p class="description">' . $result_question["description_question"] . '</p>
                 ';
                                $count_question++;

                                $get_answer2 = "SELECT * FROM answer WHERE relation_question='" . $result_question["id_question"] . "'";
                                $con_answer2 = mysqli_query($conexion, $get_answer2);

                                echo " <div class='form-group'>";

                                if ($result_question["type_question"] == "lista") {

                                    for ($i = 0; $i < mysqli_num_rows($con_answer); $i++) {
                                        mysqli_data_seek($con_answer, $i);

                                        $result_answer = mysqli_fetch_assoc($con_answer);

                                        for ($j = 0; $j < mysqli_num_rows($con_answer2); $j++) {
                                            mysqli_data_seek($con_answer2, $j);

                                            $result_answer2 = mysqli_fetch_assoc($con_answer2);

                                            if ($result_answer["id_answer"] == $result_answer2["id_answer"]) {

                                                echo "<select name='lista'>";

                                                echo "  <option value='" . $result_answer["id_answer"] . "' >" . $result_answer["title_answer"] . "</option>";

                                                echo "</select>";

                                            }
                                        }
                                    }
                                } else {

                                    echo " <div class='col-lg-12 form-group'>";

                                    if ($result_question["type_question"] == "unica") {

                                        for ($i = 0; $i < mysqli_num_rows($con_answer); $i++) {
                                            mysqli_data_seek($con_answer, $i);

                                            $result_answer = mysqli_fetch_assoc($con_answer);

                                            for ($j = 0; $j < mysqli_num_rows($con_answer2); $j++) {
                                                mysqli_data_seek($con_answer2, $j);

                                                $result_answer2 = mysqli_fetch_assoc($con_answer2);

                                                if ($result_answer["id_answer"] == $result_answer2["id_answer"]) {

                                                    echo "<label class='together'> 
                                            <input checked type='radio' name='unica' value='" . $result_answer["id_answer"] . "'>&nbsp;&nbsp;" . $result_answer["title_answer"] . "</label>";
                                                }

                                            }
                                        }

                                    } elseif ($result_question["type_question"] == "multiple") {

                                        for ($i = 0; $i < mysqli_num_rows($con_answer); $i++) {
                                            mysqli_data_seek($con_answer, $i);

                                            echo " <div class='col-lg-12 form-group'>";

                                            $result_answer = mysqli_fetch_assoc($con_answer);

                                            for ($j = 0; $j < mysqli_num_rows($con_answer2); $j++) {
                                                mysqli_data_seek($con_answer2, $j);

                                                $result_answer2 = mysqli_fetch_assoc($con_answer2);

                                                if ($result_answer["id_answer"] == $result_answer2["id_answer"]) {


                                                    echo "<label class='container'>
  
  <input  disabled checked type='checkbox'  name='multiple[]' value='" . $result_answer["id_answer"] . "'>" . $result_answer["title_answer"] . "
  
  <span class='checkmark'></span>
  
</label>";

                                                }
                                            }
                                            echo " </div>";
                                        }
                                    } elseif ($result_question["type_question"] == "abierta") {

                                        for ($i = 0; $i < mysqli_num_rows($con_answer); $i++) {
                                            mysqli_data_seek($con_answer, $i);

                                            $result_answer = mysqli_fetch_assoc($con_answer);

                                            for ($j = 0; $j < mysqli_num_rows($con_answer2); $j++) {
                                                mysqli_data_seek($con_answer2, $j);

                                                $result_answer2 = mysqli_fetch_assoc($con_answer2);

                                                if ($result_answer["id_answer"] == $result_answer2["id_answer"]) {


                                                    $get_relation_answer_user3 = "SELECT * FROM relation_answer_user 
WHERE id_user='" . $result_user["id_user"] . "' AND id_survey='" . $result_survey["id_survey"] . "' AND id_question='" . $result_question["id_question"] . "' AND id_answer='" . $result_answer["id_answer"] . "'";
                                                    $con_relation_answer_user3 = mysqli_query($conexion, $get_relation_answer_user3);
                                                    $result_relation_answer_user3 = mysqli_fetch_assoc($con_relation_answer_user3);

                                                    echo "
                                                                                <input type='text' name='abierta' value=' " . $result_relation_answer_user3["answer_open"] . "'><br>";

                                                }
                                            }
                                        }
                                    }

                                    echo " <div class='validate'></div>
                                                                            </div>";
                                }

                                echo "
                                                            </div>
                                                            <div class='mb-3'>
                                                                        <div class='loading'>Cargando</div>
                                                                        <div class='error-message'></div>
                                                                        <div class='sent-message'>Respuesta registrada exitosamente.</div>
                                                                    </div>
                                                            </form><br>";
                            }
                        } else {
                            ?>
                            <script>
                                swal("<?php echo $name ?>", "Actualmente no tiene respuestas registradas", "info");
                            </script>

                            <table id="encuesta" class="alert">

                                <tr>
                                    <th><img class="icon-nav"
                                             src="../../assets/img/icons/navbar-admin/info.svg"/>Actualmente no tiene
                                        respuestas registradas
                                    </th>
                                </tr>
                            </table>

                            <?php
                        }
                        ?>

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
                Camacho</strong>.<br> Todos los
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