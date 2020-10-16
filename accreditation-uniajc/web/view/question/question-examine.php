<?php
require('../sql/connection-MySQL.php');
$connection = conectarMySQL();
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Examinar - Pregunta | UNIAJC</title>

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

    <!-- Library SweetAlert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

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
                <li><a href="../question/question.php"><img class="icon-nav"
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

            <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">

                <div id="survey" class="section-title">
                    <h2><img class="icon-content hover-scale"
                             src="../../assets/img/icons/navbar-admin/question.svg"/>Pregunta</h2>
                    <h3><?php echo $_POST["title"] ?></h3><br>
                    <h5 style="font-style: italic"><?php echo $_POST["description"] ?></h5><br><br>

                    <h2><img class="icon-content hover-scale"
                             src="../../assets/img/icons/navbar-admin/summary.svg"/>Resultados de la Pregunta<br>
                    </h2>

                    <input class="animated fadeInUp refresh" type="button" value="Actualizar"
                           onClick="location.reload();"/>

                </div>

            </div>

            <div class="col-lg-12 d-flex  justify-content-center about-content">

                <div class="row">

                    <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">

                        <?php

                        $statementSQL = "SELECT * FROM question 
WHERE relation_survey='" . $_POST["relation_survey"] . "' AND id_question='".$_POST["id"]."'";
                        $query = mysqli_query($connection, $statementSQL);

                        if (mysqli_num_rows($query) >= 1) {

                        while ($row = mysqli_fetch_assoc($query)) {

                            $statementSQL6 = "SELECT COUNT(id_question) AS question_reply FROM relation_answer_user WHERE id_question='" . $row["id_question"] . "'";
                            $query6 = mysqli_query($connection, $statementSQL6);
                            $row6 = mysqli_fetch_assoc($query6);

                            $statementSQL2 = "SELECT * FROM answer WHERE relation_question='" . $row["id_question"] . "'";
                            $query2 = mysqli_query($connection, $statementSQL2);

                            echo "<form role='form' class='php-email-form results-chart' method='POST'>";

                            echo '
                  <a class="default" href="#answer"><img
                                                    class="icon-form"
                                                    src="../../assets/img/icons/navbar-admin/answer.svg"/>RESPUESTAS:</a>
                  <a class="title" style="cursor: default;" >' . $row6["question_reply"] . '</a>
                  
                  ';

                            echo " <div class='form-group'>";

                        if ($row6["question_reply"] != 0) {

                        if ($row["type_question"] == "unica") {

                            ?>

                            <script type="text/javascript">

                                google.charts.load('current', {'packages': ['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {

                                    var data = new google.visualization.DataTable();
                                    data.addColumn('string', 'Topping');
                                    data.addColumn('number', 'Slices');
                                    data.addRows([

                                        <?php

                                        while ($row2 = mysqli_fetch_array($query2)) {

                                            $statementSQL3 = "SELECT COUNT(id_user) AS users_reply FROM relation_answer_user WHERE id_answer='" . $row2["id_answer"] . "'";
                                            $query3 = mysqli_query($connection, $statementSQL3);
                                            $row3 = mysqli_fetch_assoc($query3);

                                            echo "['" . $row2["title_answer"] . "', " . $row3["users_reply"] . "],";

                                        }

                                        ?>

                                    ]);

                                    var options = {
                                        'width': 970,
                                        'height': 550,
                                        'is3D': true,
                                        'backgroundColor': 'transparent',
                                        fontSize: 18,
                                        fontName: "'Quicksand', sans-serif"
                                    };

                                    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                                    chart.draw(data, options);
                                }
                            </script>

                        <?php

                        echo '<div id="chart_div"></div>';

                        } else {

                        echo " <div class='col-lg-12 form-group'>";

                        if ($row["type_question"] == "multiple") {

                        ?>

                            <script type="text/javascript">

                                google.charts.load('current', {'packages': ['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {

                                    var data = new google.visualization.DataTable();
                                    data.addColumn('string', 'Topping');
                                    data.addColumn('number', 'Slices');
                                    data.addRows([

                                        <?php

                                        while ($row2 = mysqli_fetch_array($query2)) {

                                            $statementSQL3 = "SELECT COUNT(id_user) AS users_reply FROM relation_answer_user WHERE id_answer='" . $row2["id_answer"] . "'";
                                            $query3 = mysqli_query($connection, $statementSQL3);
                                            $row3 = mysqli_fetch_assoc($query3);

                                            echo "['" . $row2["title_answer"] . "', " . $row3["users_reply"] . "],";

                                        }

                                        ?>

                                    ]);

                                    var options = {
                                        'width': 970,
                                        'height': 550,
                                        'is3D': true,
                                        'backgroundColor': 'transparent',
                                        fontSize: 18,
                                        fontName: "'Quicksand', sans-serif"
                                    };

                                    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                                    chart.draw(data, options);
                                }
                            </script>

                        <?php

                        echo '<div id="chart_div"></div>';


                        } elseif ($row["type_question"] == "lista") {

                        ?>

                            <script type="text/javascript">

                                google.charts.load('current', {'packages': ['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                function drawChart() {

                                    var data = new google.visualization.DataTable();
                                    data.addColumn('string', 'Topping');
                                    data.addColumn('number', 'Slices');
                                    data.addRows([

                                        <?php

                                        while ($row2 = mysqli_fetch_array($query2)) {

                                            $statementSQL3 = "SELECT COUNT(id_user) AS users_reply FROM relation_answer_user WHERE id_answer='" . $row2["id_answer"] . "'";
                                            $query3 = mysqli_query($connection, $statementSQL3);
                                            $row3 = mysqli_fetch_assoc($query3);

                                            echo "['" . $row2["title_answer"] . "', " . $row3["users_reply"] . "],";

                                        }

                                        ?>

                                    ]);

                                    var options = {
                                        'width': 970,
                                        'height': 550,
                                        'is3D': true,
                                        'backgroundColor': 'transparent',
                                        fontSize: 18,
                                        fontName: "'Quicksand', sans-serif"
                                    };

                                    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
                                    chart.draw(data, options);
                                }
                            </script>

                        <?php

                        echo '<div id="chart_div"></div>';


                        } elseif ($row["type_question"] == "abierta") {

                            while ($row2 = mysqli_fetch_array($query2)) {

                                $statementSQL4 = "SELECT COUNT(id_user) AS users_reply FROM relation_answer_user WHERE id_answer='" . $row2["id_answer"] . "'";
                                $query4 = mysqli_query($connection, $statementSQL4);
                                $row4 = mysqli_fetch_assoc($query4);

                                $statementSQL5 = "SELECT answer_open FROM relation_answer_user WHERE id_question='" . $row["id_question"] . "'";
                                $query5 = mysqli_query($connection, $statementSQL5);

                                while ($row5 = mysqli_fetch_assoc($query5)) {
                                    echo "
                                            <input type='text' style='width:100%' name='abierta' value=' " . $row5["answer_open"] . "'><br>";
                                }
                            }
                        }
                        echo " <div class='validate'></div>
                                        </div>";

                        }
                        } else {

                        ?>

                            <script>
                                swal("<?php echo $_POST["title"] ?>", "Actualmente no tiene respuestas registradas", "info");
                            </script>

                            <div style="text-align: center">

                            <table id="encuesta" class="alert">

                                <tr>
                                    <th><img class="icon-nav"
                                             src="../../assets/img/icons/navbar-admin/info.svg"/>Actualmente no tiene
                                        respuestas registradas
                                    </th>
                                </tr>
                            </table>

                                </div>

                        <?php

                        }

                        echo "
                        </div>
                        </form><br>";
                        }
                        } else {
                        ?>
                            <script>
                                swal("<?php echo $_POST["title"] ?>", "Actualmente no tiene preguntas registradas.", "info");
                            </script>

                            <table id="encuesta" class="alert">

                                <tr>
                                    <th><img class="icon-nav"
                                             src="../../assets/img/icons/navbar-admin/info.svg"/>Actualmente no tiene
                                        preguntas registradas
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
                Camacho</strong>. <br>Todos los
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