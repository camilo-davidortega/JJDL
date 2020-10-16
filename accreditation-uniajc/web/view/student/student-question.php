<?php
require('../../view/sql/connection-MySQL.php');
$conexion = conectarMySQL();
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Preguntas - Estudiante | UNIAJC</title>
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
                $id_survey = $_GET["id_survey"];
                $title = $_GET["title"];
                ?>
                <li>
                    <a href="../student/student-main-results.php?email=<?php echo $email . "&id_survey=" . $id_survey . "&title=" . $title ?>"><img
                                class="icon-nav"
                                src="../../assets/img/icons/navbar-admin/answer.svg"/>Respuestas</a>
                </li>
                <li><a href=<?php echo "../main/student-main.php?email=" . $email ?>><img class="icon-nav"
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
            $statementSQL3 = "SELECT * FROM user WHERE email='" . $_GET["email"] . "'";
            $consulta3 = mysqli_query($conexion, $statementSQL3);
            $row3 = mysqli_fetch_assoc($consulta3);

            $statementSQL4 = "SELECT COUNT(DISTINCT id_question) AS question_missing2 
FROM relation_answer_user
WHERE id_user='" . $row3["id_user"] . "' AND id_survey='" . $_GET["id_survey"] . "'";
            $consulta4 = mysqli_query($conexion, $statementSQL4);

            if (mysqli_num_rows($consulta4) >= 1) {

                $row4 = mysqli_fetch_assoc($consulta4);

                $answered = $row4['question_missing2'];

                $declaracionSQL2 = "SELECT COUNT(DISTINCT id_question) AS question_missing 
FROM question
WHERE relation_survey='" . $_GET["id_survey"] . "' AND status_question='on'";
                $consulta2 = mysqli_query($conexion, $declaracionSQL2);
                $fila2 = mysqli_fetch_assoc($consulta2);

                $total = $fila2['question_missing'];

                $missing = $total - $answered;

            } else {

                $declaracionSQL2 = "SELECT COUNT(DISTINCT id_question) AS question_missing 
FROM question
WHERE relation_survey='" . $_GET["id_survey"] . "' AND status_question='on'";
                $consulta2 = mysqli_query($conexion, $declaracionSQL2);
                $fila2 = mysqli_fetch_assoc($consulta2);

                $missing = $fila2['question_missing'];
            }

            ?>

            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">

                <?php
                $statementSQL6 = "SELECT * FROM survey WHERE id_survey='" . $_GET["id_survey"] . "'";
                $consulta6 = mysqli_query($conexion, $statementSQL6);
                $row6 = mysqli_fetch_assoc($consulta6);
                ?>

                <div id="survey" class="section-title">
                    <h2><img class="icon-content hover-scale"
                             src="../../assets/img/icons/navbar-admin/survey.svg"/>Encuesta</h2>
                    <h3><?php echo $title ?></h3><br>
                    <h5 style="font-style: italic"><?php echo $row6["description_survey"] ?></h5><br><br>
                    <h2><img class="icon-content hover-scale"
                             src="../../assets/img/icons/navbar-admin/question.svg"/>Preguntas de la Encuesta -
                        Restantes: <?php echo $missing ?><br>
                    </h2>

                    <input class="animated fadeInUp refresh" type="button" value="Actualizar"
                           onClick="location.reload();"/>

                </div>
            </div>

            <div class="col-lg-12 d-flex  justify-content-center about-content">
                <div class="row">


                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">

                        <?php
                        $statementSQL = "SELECT * FROM user WHERE email='" . $_GET["email"] . "'";
                        $consulta = mysqli_query($conexion, $statementSQL);
                        $row = mysqli_fetch_assoc($consulta);

                        $statementSQL = "SELECT * 
FROM relation_answer_user 
WHERE id_user='" . $row["id_user"] . "' AND id_survey='" . $_GET["id_survey"] . "'";
                        $consulta = mysqli_query($conexion, $statementSQL);

                        if (mysqli_num_rows($consulta) >= 1) {

                        if ($missing == 0) {
                            ?>
                            <script>
                                swal("<?php echo $_POST["title"] ?>", "Actualmente no tiene preguntas disponibles.", "info");
                            </script>

                            <table id="encuesta" class="alert">

                                <tr>
                                    <th><img class="icon-nav"
                                             src="../../assets/img/icons/navbar-admin/info.svg"/>Actualmente no
                                        tiene preguntas disponibles
                                    </th>
                                </tr>
                            </table>

                        <?php
                        }

                        $statementSQL = "SELECT * FROM question 
                                WHERE relation_survey='" . $_GET["id_survey"] . "' AND status_question='on'";

                        while ($row = mysqli_fetch_assoc($consulta)) {

                            $statementSQL .= " AND id_question!='" . $row["id_question"] . "'";
                        }
                        $query = mysqli_query($conexion, $statementSQL);

                        $i = 0;
                        while ($row = mysqli_fetch_assoc($query)) {
                            $i++;

                            $statementSQL2 = "SELECT * FROM answer WHERE relation_question='" . $row["id_question"] . "' AND status_answer='on'";
                            $query2 = mysqli_query($conexion, $statementSQL2);

                            echo "<form method='POST' onsubmit=\"return confirm('¿Está seguro que desea realizar esta acción?');\" role='form' class='php-email-form'>";

                            echo '
                    <h5 style="text-align: center"><img class="icon-form"
                             src="../../assets/img/icons/navbar-admin/question.svg"/>Pregunta: ' . $i . ' de ' . $missing . '<br>
                    </h5>
                 <h5 class="title"><a style="cursor: default" href="#question">' . $row["title_question"] . '</a></h5>
                <p class="description">' . $row["description_question"] . '</p>
                 ';

                            echo " <div class='form-group'>";

                            if ($row["type_question"] == "lista") {
                                echo "<select name='lista'>";
                                while ($row2 = mysqli_fetch_array($query2)) {

                                    echo "  <option value='" . $row2["id_answer"] . "' >" . $row2["title_answer"] . "</option>";
                                }

                                echo "</select>";
                            } else {

                                while ($row2 = mysqli_fetch_array($query2)) {

                                    echo " <div class='col-lg-12 form-group'>";

                                    if ($row["type_question"] == "unica") {

                                        echo "<label class='together'> 
                                            <input type='radio' name='unica' value='" . $row2["id_answer"] . "'>&nbsp;&nbsp;" . $row2["title_answer"] . "</label>";

                                    } elseif ($row["type_question"] == "multiple") {

                                        echo "<label class='container'>
  
  <input type='checkbox'  name='multiple[]' value='" . $row2["id_answer"] . "'>" . $row2["title_answer"] . "
  
  <span class='checkmark'></span>
  
</label>";

                                    } elseif ($row["type_question"] == "abierta") {

                                        echo "
                                            <input type='text' name='abierta' placeholder='" . $row2["title_answer"] . "'><br>
                                             <input type='hidden' name='id_abierta' value='" . $row2["id_answer"] . "'>";
                                    }

                                    echo " <div class='validate'></div>
                                                                            </div>";
                                }
                            }


                            echo "
                                                            </div>
                                                            <div class='mb-3'>
                                                                        <div class='loading'>Cargando</div>
                                                                        <div class='error-message'></div>
                                                                        <div class='sent-message'>Respuesta registrada exitosamente.</div>
                                                                    </div>
                                                                    <div class='text-center'>
                                                                    <input type='submit' onclick=\"this.form.action='student-question-back-reply.php?email=" . $_GET["email"] . "&id_survey=" . $_GET["id_survey"] . "&title=" . $_GET["title"] . "&id_question=" . $row["id_question"] . "'\" value='Responder' name='guardar'/>
                                                                    </div>
                                                            </form><br>";
                        }
                        } else {

                        $statementSQL = "SELECT * FROM question 
WHERE relation_survey='" . $_GET["id_survey"] . "' AND status_question='on'";
                        $query = mysqli_query($conexion, $statementSQL);

                        if (mysqli_num_rows($query) >= 1) {

                            $i = 0;
                            while ($row = mysqli_fetch_assoc($query)) {

                                $statementSQL2 = "SELECT * FROM answer WHERE relation_question='" . $row["id_question"] . "' AND status_answer='on'";
                                $query2 = mysqli_query($conexion, $statementSQL2);

                                echo "<form method='POST' onsubmit=\"return confirm('¿Está seguro que desea realizar esta acción?');\" role='form' class='php-email-form'>";

                                echo '
                    <h5 style="text-align: center"><img class="icon-form"
                             src="../../assets/img/icons/navbar-admin/question.svg"/>Pregunta: ' . ($i + 1) . ' de ' . $missing . '<br>
                    </h5>
                 <h5 class="title"><a style="cursor: default" href="#question">' . $row["title_question"] . '</a></h5>
                <p class="description">' . $row["description_question"] . '</p>
                 ';
                                $i++;

                                echo " <div class='form-group'>";

                                if ($row["type_question"] == "lista") {
                                    echo "<select name='lista'>";
                                    while ($row2 = mysqli_fetch_array($query2)) {

                                        echo "  <option value='" . $row2["id_answer"] . "' >" . $row2["title_answer"] . "</option>";
                                    }

                                    echo "</select>";
                                } else {
                                    while ($row2 = mysqli_fetch_array($query2)) {

                                        echo " <div class='col-lg-12 form-group'>";

                                        if ($row["type_question"] == "unica") {

                                            echo "<label class='together'> 
                                            <input type='radio' name='unica' value='" . $row2["id_answer"] . "'>&nbsp;&nbsp;" . $row2["title_answer"] . "</label>";
                                        } elseif ($row["type_question"] == "multiple") {

                                            echo "<label class='container'>
  
  <input type='checkbox'  name='multiple[]' value='" . $row2["id_answer"] . "'>" . $row2["title_answer"] . "
  
  <span class='checkmark'></span>
  
</label>";

                                        } elseif ($row["type_question"] == "abierta") {

                                            echo "
                                            <input type='text' name='abierta' placeholder='" . $row2["title_answer"] . "'><br>
                                             <input type='hidden' name='id_abierta' value='" . $row2["id_answer"] . "'>";

                                        }

                                        echo " <div class='validate'></div>
                                        </div>";
                                    }
                                }


                                echo "
                        </div>
                        <div class='mb-3'>
                                    <div class='loading'>Cargando</div>
                                    <div class='error-message'></div>
                                    <div class='sent-message'>Respuesta registrada exitosamente.</div>
                                </div>
                                <div class='text-center'>
                                                                    <input type='submit' onclick=\"this.form.action='student-question-back-reply.php?email=" . $_GET["email"] . "&id_survey=" . $_GET["id_survey"] . "&title=" . $_GET["title"] . "&id_question=" . $row["id_question"] . "'\" value='Responder' name='guardar'/>
                                                                    </div>
                        </form><br>";
                            }
                        } else {
                        ?>
                            <script>
                                swal("<?php echo $_POST["title"] ?>", "Actualmente no tiene preguntas disponibles.", "info");
                            </script>

                            <table id="encuesta" class="alert">

                                <tr>
                                    <th><img class="icon-nav"
                                             src="../../assets/img/icons/navbar-admin/info.svg"/>Actualmente no
                                        tiene preguntas disponibles
                                    </th>
                                </tr>
                            </table>

                            <?php
                        }

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