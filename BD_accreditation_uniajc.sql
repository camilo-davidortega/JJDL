-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2020 a las 02:46:21
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `accreditation_uniajc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answer`
--

CREATE TABLE `answer` (
  `id_answer` int(11) NOT NULL,
  `relation_question` int(11) NOT NULL,
  `title_answer` text COLLATE utf8_spanish_ci NOT NULL,
  `description_answer` text COLLATE utf8_spanish_ci NOT NULL,
  `status_answer` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `created_date_answer` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `answer`
--

INSERT INTO `answer` (`id_answer`, `relation_question`, `title_answer`, `description_answer`, `status_answer`, `created_date_answer`) VALUES
(3, 1, 'Semestre 1', '', 'on', '2020-07-29 16:03:39'),
(4, 1, 'Semestre 2', '', 'on', '2020-07-29 16:03:48'),
(5, 1, 'Semestre 3', '', 'on', '2020-07-29 16:03:53'),
(6, 1, 'Semestre 4', '', 'on', '2020-07-29 16:03:58'),
(7, 1, 'Semestre 5', '', 'on', '2020-07-29 16:04:04'),
(8, 1, 'Semestre 6', '', 'on', '2020-07-29 16:04:09'),
(9, 1, 'Semestre 7', '', 'on', '2020-07-29 16:04:15'),
(10, 1, 'Semestre 8', '', 'on', '2020-07-29 16:04:21'),
(11, 1, 'Semestre 9', '', 'on', '2020-07-29 16:04:26'),
(12, 1, 'Semestre 10', 'Semestre final', 'on', '2020-07-29 16:04:31'),
(13, 2, 'Diurna', 'En la mañana', 'on', '2020-07-29 16:12:32'),
(14, 2, 'Nocturna', 'En la noche', 'on', '2020-07-29 16:12:50'),
(15, 3, 'Norte', 'Avenida 6 norte # 28 n – 102', 'on', '2020-07-29 16:19:04'),
(16, 3, 'Sur', 'Calle 25 # 127 – 220 Km 7 vía Cali – Jamundí Parquesoft', 'on', '2020-07-29 16:19:32'),
(17, 4, 'Sí', '', 'on', '2020-07-29 16:25:55'),
(18, 4, 'No', '', 'on', '2020-07-29 16:26:01'),
(19, 5, 'Sí', '', 'on', '2020-07-29 16:43:10'),
(20, 5, 'No', '', 'on', '2020-07-29 16:43:16'),
(21, 6, 'Sí', '', 'on', '2020-07-29 16:46:50'),
(22, 6, 'No', '', 'on', '2020-07-29 16:46:54'),
(23, 7, 'Totalmente de acuerdo', '', 'on', '2020-07-29 23:30:00'),
(24, 7, 'De acuerdo', '', 'on', '2020-07-29 23:30:10'),
(25, 7, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-29 23:30:18'),
(26, 7, 'En desacuerdo', '', 'on', '2020-07-29 23:30:27'),
(27, 7, 'Totalmente en desacuerdo', '', 'on', '2020-07-29 23:30:36'),
(28, 7, 'No sabe', '', 'on', '2020-07-29 23:30:46'),
(29, 8, 'Totalmente de acuerdo', '', 'on', '2020-07-29 23:31:57'),
(30, 8, 'De acuerdo', '', 'on', '2020-07-29 23:32:03'),
(31, 8, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-29 23:32:08'),
(32, 8, 'En desacuerdo', '', 'on', '2020-07-29 23:32:12'),
(33, 8, 'Totalmente en desacuerdo', '', 'on', '2020-07-29 23:32:17'),
(34, 8, 'No sabe', '', 'on', '2020-07-29 23:32:21'),
(35, 9, 'Totalmente de acuerdo', '', 'on', '2020-07-29 23:33:40'),
(36, 9, 'De acuerdo', '', 'on', '2020-07-29 23:33:46'),
(37, 9, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-29 23:33:50'),
(38, 9, 'En desacuerdo', '', 'on', '2020-07-29 23:33:54'),
(39, 9, 'Totalmente en desacuerdo', '', 'on', '2020-07-29 23:33:59'),
(40, 9, 'No sabe', '', 'on', '2020-07-29 23:34:05'),
(41, 10, 'Excelente', '', 'on', '2020-07-29 23:35:21'),
(42, 10, 'Bueno', '', 'on', '2020-07-29 23:35:26'),
(43, 10, 'Regular', '', 'on', '2020-07-29 23:35:33'),
(44, 10, 'Malo', '', 'on', '2020-07-29 23:35:38'),
(45, 10, 'Muy malo', '', 'on', '2020-07-29 23:35:49'),
(46, 10, 'No sabe', '', 'on', '2020-07-29 23:35:57'),
(47, 11, 'Excelente', '', 'on', '2020-07-29 23:37:23'),
(48, 11, 'Bueno', '', 'on', '2020-07-29 23:37:28'),
(49, 11, 'Regular', '', 'on', '2020-07-29 23:37:32'),
(50, 11, 'Malo', '', 'on', '2020-07-29 23:37:36'),
(51, 11, 'Muy malo', '', 'on', '2020-07-29 23:37:41'),
(52, 11, 'No sabe', '', 'on', '2020-07-29 23:37:45'),
(53, 12, 'Sí', '', 'on', '2020-07-29 23:38:25'),
(54, 12, 'No', '', 'on', '2020-07-29 23:38:31'),
(55, 13, 'Excelente', '', 'on', '2020-07-29 23:40:31'),
(56, 13, 'Bueno', '', 'on', '2020-07-29 23:40:35'),
(57, 13, 'Regular', '', 'on', '2020-07-29 23:40:39'),
(58, 13, 'Malo', '', 'on', '2020-07-29 23:40:43'),
(59, 13, 'Muy malo', '', 'on', '2020-07-29 23:40:47'),
(60, 13, 'No sabe', '', 'on', '2020-07-29 23:40:50'),
(61, 14, 'Totalmente de acuerdo', '', 'on', '2020-07-29 23:41:37'),
(62, 14, 'De acuerdo', '', 'on', '2020-07-29 23:41:43'),
(63, 14, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-29 23:41:47'),
(64, 14, 'En desacuerdo', '', 'on', '2020-07-29 23:41:52'),
(65, 14, 'Totalmente en desacuerdo', '', 'on', '2020-07-29 23:41:58'),
(66, 14, 'No sabe', '', 'on', '2020-07-29 23:42:05'),
(67, 15, 'Excelente', '', 'on', '2020-07-29 23:43:50'),
(68, 15, 'Bueno', '', 'on', '2020-07-29 23:43:54'),
(69, 15, 'Regular', '', 'on', '2020-07-29 23:43:58'),
(70, 15, 'Malo', '', 'on', '2020-07-29 23:44:02'),
(71, 15, 'Muy malo', '', 'on', '2020-07-29 23:44:07'),
(72, 15, 'No sabe', '', 'on', '2020-07-29 23:44:11'),
(73, 16, 'Totalmente de acuerdo', '', 'on', '2020-07-29 23:45:06'),
(74, 16, 'De acuerdo', '', 'on', '2020-07-29 23:45:10'),
(75, 16, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-29 23:45:14'),
(76, 16, 'En desacuerdo', '', 'on', '2020-07-29 23:45:19'),
(77, 16, 'Totalmente en desacuerdo', '', 'on', '2020-07-29 23:45:23'),
(78, 16, 'No sabe', '', 'on', '2020-07-29 23:45:28'),
(79, 17, 'Totalmente de acuerdo', '', 'on', '2020-07-29 23:45:58'),
(80, 17, 'De acuerdo', '', 'on', '2020-07-29 23:46:03'),
(81, 17, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-29 23:46:07'),
(82, 17, 'En desacuerdo', '', 'on', '2020-07-29 23:46:11'),
(83, 17, 'Totalmente en desacuerdo', '', 'on', '2020-07-29 23:46:16'),
(84, 17, 'No sabe', '', 'on', '2020-07-29 23:46:20'),
(85, 18, 'Totalmente de acuerdo', '', 'on', '2020-07-29 23:46:48'),
(86, 18, 'De acuerdo', '', 'on', '2020-07-29 23:46:52'),
(87, 18, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-29 23:46:58'),
(88, 18, 'En desacuerdo', '', 'on', '2020-07-29 23:47:02'),
(89, 18, 'Totalmente en desacuerdo', '', 'on', '2020-07-29 23:47:06'),
(90, 18, 'No sabe', '', 'on', '2020-07-29 23:47:10'),
(91, 19, 'Totalmente de acuerdo', '', 'on', '2020-07-29 23:48:09'),
(92, 19, 'De acuerdo', '', 'on', '2020-07-29 23:48:13'),
(93, 19, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-29 23:48:19'),
(94, 19, 'En desacuerdo', '', 'on', '2020-07-29 23:48:24'),
(95, 19, 'Totalmente en desacuerdo', '', 'on', '2020-07-29 23:48:28'),
(96, 19, 'No sabe', '', 'on', '2020-07-29 23:48:32'),
(97, 20, 'Totalmente de acuerdo', '', 'on', '2020-07-29 23:48:59'),
(98, 20, 'De acuerdo', '', 'on', '2020-07-29 23:49:03'),
(99, 20, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-29 23:49:07'),
(100, 20, 'En desacuerdo', '', 'on', '2020-07-29 23:49:11'),
(101, 20, 'Totalmente en desacuerdo', '', 'on', '2020-07-29 23:49:16'),
(102, 20, 'No sabe', '', 'on', '2020-07-29 23:49:20'),
(103, 21, 'Totalmente de acuerdo', '', 'on', '2020-07-29 23:49:59'),
(104, 21, 'De acuerdo', '', 'on', '2020-07-29 23:50:04'),
(105, 21, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-29 23:50:08'),
(106, 21, 'En desacuerdo', '', 'on', '2020-07-29 23:50:13'),
(107, 21, 'Totalmente en desacuerdo', '', 'on', '2020-07-29 23:50:17'),
(108, 21, 'No sabe', '', 'on', '2020-07-29 23:50:21'),
(109, 22, 'Totalmente de acuerdo', '', 'on', '2020-07-29 23:51:21'),
(110, 22, 'De acuerdo', '', 'on', '2020-07-29 23:51:26'),
(111, 22, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-29 23:51:31'),
(112, 22, 'En desacuerdo', '', 'on', '2020-07-29 23:51:36'),
(113, 22, 'Totalmente en desacuerdo', '', 'on', '2020-07-29 23:51:40'),
(114, 22, 'No sabe', '', 'on', '2020-07-29 23:51:45'),
(115, 23, 'Totalmente de acuerdo', '', 'on', '2020-07-29 23:52:14'),
(116, 23, 'De acuerdo', '', 'on', '2020-07-29 23:52:18'),
(117, 23, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-29 23:52:24'),
(118, 23, 'En desacuerdo', '', 'on', '2020-07-29 23:52:28'),
(119, 23, 'Totalmente en desacuerdo', '', 'on', '2020-07-29 23:52:33'),
(120, 23, 'No sabe', '', 'on', '2020-07-29 23:52:37'),
(121, 24, 'Totalmente de acuerdo', '', 'on', '2020-07-29 23:53:38'),
(122, 24, 'De acuerdo', '', 'on', '2020-07-29 23:53:43'),
(123, 24, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-29 23:53:47'),
(124, 24, 'En desacuerdo', '', 'on', '2020-07-29 23:53:53'),
(125, 24, 'Totalmente en desacuerdo', '', 'on', '2020-07-29 23:53:58'),
(126, 24, 'No sabe', '', 'on', '2020-07-29 23:54:02'),
(127, 25, 'Totalmente de acuerdo', '', 'on', '2020-07-29 23:55:57'),
(128, 25, 'De acuerdo', '', 'on', '2020-07-29 23:56:02'),
(129, 25, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-29 23:56:06'),
(130, 25, 'En desacuerdo', '', 'on', '2020-07-29 23:56:12'),
(131, 25, 'Totalmente en desacuerdo', '', 'on', '2020-07-29 23:56:16'),
(132, 25, 'No sabe', '', 'on', '2020-07-29 23:56:20'),
(135, 27, 'Excelente', '', 'on', '2020-07-30 00:00:17'),
(136, 27, 'Bueno', '', 'on', '2020-07-30 00:00:22'),
(137, 27, 'Regular', '', 'on', '2020-07-30 00:00:27'),
(138, 27, 'Malo', '', 'on', '2020-07-30 00:00:32'),
(139, 27, 'Muy malo', '', 'on', '2020-07-30 00:00:36'),
(140, 27, 'No sabe', '', 'on', '2020-07-30 00:00:42'),
(141, 28, 'Totalmente de acuerdo', '', 'on', '2020-07-30 00:02:29'),
(142, 28, 'De acuerdo', '', 'on', '2020-07-30 00:02:34'),
(143, 28, 'Ni de acuerdo ni en desacuerdo', '', 'on', '2020-07-30 00:02:39'),
(144, 28, 'En desacuerdo', '', 'on', '2020-07-30 00:02:43'),
(145, 28, 'Totalmente en desacuerdo', '', 'on', '2020-07-30 00:02:47'),
(146, 28, 'No sabe', '', 'on', '2020-07-30 00:02:52'),
(147, 29, 'Excelente', '', 'on', '2020-07-30 00:04:53'),
(148, 29, 'Bueno', '', 'on', '2020-07-30 00:04:57'),
(149, 29, 'Regular', '', 'on', '2020-07-30 00:05:01'),
(150, 29, 'Malo', '', 'on', '2020-07-30 00:05:06'),
(151, 29, 'Muy malo', '', 'on', '2020-07-30 00:05:10'),
(152, 29, 'No sabe', '', 'on', '2020-07-30 00:05:14'),
(153, 26, 'Salud', '', 'on', '2020-08-11 23:41:06'),
(154, 26, 'Psicológicos', '', 'on', '2020-08-11 23:41:41'),
(155, 26, 'Culturales', '', 'on', '2020-08-11 23:41:59'),
(156, 26, 'Deportivos y Recreativos', '', 'on', '2020-08-11 23:42:15'),
(157, 26, 'Desarrollo profesional', '', 'on', '2020-08-11 23:43:08'),
(158, 26, 'Mejoramiento Académico (PMA)', '', 'on', '2020-08-11 23:43:32'),
(159, 33, 'Describe puntualmente los inconvenientes', '', 'on', '2020-08-12 16:39:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `question`
--

CREATE TABLE `question` (
  `id_question` int(11) NOT NULL,
  `relation_survey` int(11) NOT NULL,
  `title_question` text COLLATE utf8_spanish_ci NOT NULL,
  `description_question` text COLLATE utf8_spanish_ci NOT NULL,
  `type_question` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `status_question` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `created_date_question` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `question`
--

INSERT INTO `question` (`id_question`, `relation_survey`, `title_question`, `description_question`, `type_question`, `status_question`, `created_date_question`) VALUES
(1, 1, 'Semestre en curso', 'Selecciona el semestre en el que te encuentras actualmente ', 'lista', 'on', '2020-07-29 16:01:54'),
(2, 1, 'Franja', 'Jornada en la que se encuentra estudiando', 'unica', 'on', '2020-07-29 16:12:10'),
(3, 1, 'Bloque', 'Sede en la que se encuentra estudiando', 'unica', 'on', '2020-07-29 16:14:10'),
(4, 1, '¿Se encuentra actualmente trabajando?', '', 'unica', 'on', '2020-07-29 16:25:23'),
(5, 1, '¿Conoce la misión y la visión Institucional?', '', 'unica', 'on', '2020-07-29 16:42:57'),
(6, 1, '¿Conoce el Proyecto Educativo del Programa (PEP)?', '', 'unica', 'on', '2020-07-29 16:46:21'),
(7, 1, 'El número de estudiantes que ingresa al Programa Académico de Ingeniería en Sistemas, es adecuado y puede ser atendido con los recursos físicos y tecnológicos existentes actualmente en la Institución', '', 'unica', 'on', '2020-07-29 16:51:02'),
(8, 1, 'El número de estudiantes que ingresa al Programa Académico de Ingeniería en Sistemas, es adecuado y puede ser atendido con el personal administrativo existente (administrativos, docentes, directivos, servicio generales) actualmente en la Institución', '', 'unica', 'on', '2020-07-29 23:31:07'),
(9, 1, 'Los recursos académicos como bibliografías, bases de datos, tutorías, objetos virtuales, etc., son suficientes para su formación profesional:', '', 'unica', 'on', '2020-07-29 23:33:29'),
(10, 1, '¿La calidad de los espacios que ofrece la Institución para la participación en actividades académicas y culturales distintas a la docencia es?', '', 'unica', 'on', '2020-07-29 23:35:09'),
(11, 1, '¿Las estrategias que ofrece la Institución para  la participación en actividades académicas y culturales distintas a la docencia son?', '', 'unica', 'on', '2020-07-29 23:37:03'),
(12, 1, '¿Conoce el reglamento estudiantil?', '', 'unica', 'on', '2020-07-29 23:38:15'),
(13, 1, '¿La labor de los representantes estudiantiles en los órganos de dirección de la Institución (Consejo de Directivo, Facultad y Académico) es?', '', 'unica', 'on', '2020-07-29 23:40:19'),
(14, 1, 'El número de profesores es suficiente para el cumplimiento de la funciones misionales en el Programa Académico de Ingeniería en Sistemas', '', 'unica', 'on', '2020-07-29 23:41:25'),
(15, 1, '¿La calidad académica y humana de los profesores al servicio del Programa Académico de Ingeniería en Sistemas es?', '', 'unica', 'on', '2020-07-29 23:43:37'),
(16, 1, 'Los materiales de apoyo (guías para: estudio, talleres, tutoriales, laboratorios, etc.) producidos o utilizados por los profesores favorecen su educación:', '', 'unica', 'on', '2020-07-29 23:44:51'),
(17, 1, 'La UNIAJC y su Programa Académico de Ingeniería en Sistemas ofrecen una formación integral de calidad', '', 'unica', 'on', '2020-07-29 23:45:46'),
(18, 1, 'El plan de estudios ofrece diversas alternativas para la matricula de asignaturas (electivas, cursos, en otra jornada u otros semestres)', '', 'unica', 'on', '2020-07-29 23:46:37'),
(19, 1, 'El Programa Académico de Ingeniería en Sistemas ofrece la posibilidad de relacionarse con otras disciplinas a través de otras actividades académicas (semilleros de investigación, desarrollo de proyectos, eventos académicos, entre otros)', '', 'unica', 'on', '2020-07-29 23:47:58'),
(20, 1, 'La metodología de enseñanza y el desarrollo de los contenidos se ejecutan de manera coherente con lo estipulado en el plan de estudios', '', 'unica', 'on', '2020-07-29 23:48:49'),
(21, 1, 'Las evaluaciones académicas son pertinentes y coherentes con los acuerdos pedagógicos', '', 'unica', 'on', '2020-07-29 23:49:50'),
(22, 1, 'El sistema de evaluación académica es útil en la adquisición de competencias, tales como las actitudes, los conocimientos, las capacidades y las habilidades propias del Programa Académico de Ingeniería en Sistemas', '', 'unica', 'on', '2020-07-29 23:50:52'),
(23, 1, 'El sistema de evaluación a los estudiantes se realizan con transparencia y equidad', '', 'unica', 'on', '2020-07-29 23:52:01'),
(24, 1, 'El Programa Académico de Ingeniería en Sistemas realiza actividades de autoevaluación y autorregulación para mejorar la calidad', '', 'unica', 'on', '2020-07-29 23:53:22'),
(25, 1, 'Los servicios y las actividades de Bienestar Universitario que ofrece la UNIAJC son pertinentes con la modalidad del Programa Académico de Ingeniería en Sistemas y contribuyen a su desarrollo personal dándoles solución a sus necesidades básicas (recreación, cultural, deportivas, psicológicas..)', '', 'unica', 'on', '2020-07-29 23:55:33'),
(26, 1, '¿Ha participado de los servicios que ofrece Bienestar Universitario?', 'Selecciona los servicios en los que has participado', 'multiple', 'on', '2020-07-29 23:59:07'),
(27, 1, 'El grado de calidad de los servicios ofrecidos por Bienestar Universitario son:', '', 'unica', 'on', '2020-07-29 23:59:51'),
(28, 1, 'La Institución brinda las condiciones académicas y administrativas para garantizar la permanencia y culminación del proceso de formación de  los estudiantes', '', 'unica', 'on', '2020-07-30 00:02:10'),
(29, 1, 'La calidad del acceso a los sistemas de comunicación e información (Academusoft, Aulas virtuales, Apps..) son', '', 'unica', 'on', '2020-07-30 00:04:37'),
(33, 2, '¿Has tenido inconvenientes a la hora de solicitar un libro en la biblioteca? ', '', 'abierta', 'on', '2020-08-12 01:13:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `relation_answer_user`
--

CREATE TABLE `relation_answer_user` (
  `id_user` int(11) NOT NULL,
  `id_answer` int(11) NOT NULL,
  `id_question` int(11) NOT NULL,
  `id_survey` int(11) NOT NULL,
  `answer_open` varchar(300) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `relation_answer_user`
--

INSERT INTO `relation_answer_user` (`id_user`, `id_answer`, `id_question`, `id_survey`, `answer_open`) VALUES
(5, 8, 1, 1, 'NULL'),
(5, 13, 2, 1, 'NULL'),
(5, 15, 3, 1, 'NULL'),
(5, 18, 4, 1, 'NULL'),
(5, 19, 5, 1, 'NULL'),
(5, 22, 6, 1, 'NULL'),
(5, 24, 7, 1, 'NULL'),
(5, 30, 8, 1, 'NULL'),
(5, 35, 9, 1, 'NULL'),
(5, 43, 10, 1, 'NULL'),
(5, 158, 26, 1, 'NULL'),
(5, 53, 12, 1, 'NULL'),
(5, 62, 14, 1, 'NULL'),
(5, 86, 18, 1, 'NULL'),
(5, 92, 19, 1, 'NULL'),
(5, 142, 28, 1, 'NULL'),
(5, 81, 17, 1, 'NULL'),
(5, 122, 24, 1, 'NULL'),
(5, 74, 16, 1, 'NULL'),
(5, 104, 21, 1, 'NULL'),
(5, 116, 23, 1, 'NULL'),
(5, 136, 27, 1, 'NULL'),
(5, 68, 15, 1, 'NULL'),
(5, 98, 20, 1, 'NULL'),
(5, 148, 29, 1, 'NULL'),
(5, 109, 22, 1, 'NULL'),
(5, 127, 25, 1, 'NULL'),
(5, 48, 11, 1, 'NULL'),
(5, 56, 13, 1, 'NULL'),
(4, 7, 1, 1, 'NULL'),
(4, 13, 2, 1, 'NULL'),
(4, 15, 3, 1, 'NULL'),
(4, 18, 4, 1, 'NULL'),
(4, 158, 26, 1, 'NULL'),
(4, 19, 5, 1, 'NULL'),
(4, 148, 29, 1, 'NULL'),
(4, 22, 6, 1, 'NULL'),
(4, 23, 7, 1, 'NULL'),
(4, 35, 9, 1, 'NULL'),
(4, 43, 10, 1, 'NULL'),
(4, 53, 12, 1, 'NULL'),
(4, 69, 15, 1, 'NULL'),
(4, 73, 16, 1, 'NULL'),
(4, 85, 18, 1, 'NULL'),
(6, 3, 1, 1, 'NULL'),
(6, 14, 2, 1, 'NULL'),
(6, 16, 3, 1, 'NULL'),
(6, 17, 4, 1, 'NULL'),
(6, 155, 26, 1, 'NULL'),
(6, 156, 26, 1, 'NULL'),
(6, 158, 26, 1, 'NULL'),
(6, 20, 5, 1, 'NULL'),
(6, 73, 16, 1, 'NULL'),
(6, 53, 12, 1, 'NULL'),
(6, 98, 20, 1, 'NULL'),
(6, 35, 9, 1, 'NULL'),
(6, 21, 6, 1, 'NULL'),
(6, 61, 14, 1, 'NULL'),
(6, 67, 15, 1, 'NULL'),
(6, 103, 21, 1, 'NULL'),
(6, 121, 24, 1, 'NULL'),
(6, 29, 8, 1, 'NULL'),
(6, 48, 11, 1, 'NULL'),
(6, 80, 17, 1, 'NULL'),
(7, 159, 33, 2, 'No, la atención es excelente'),
(7, 8, 1, 1, 'NULL'),
(7, 13, 2, 1, 'NULL'),
(7, 156, 26, 1, 'NULL'),
(7, 158, 26, 1, 'NULL'),
(7, 16, 3, 1, 'NULL'),
(7, 17, 4, 1, 'NULL'),
(7, 19, 5, 1, 'NULL'),
(7, 22, 6, 1, 'NULL'),
(7, 24, 7, 1, 'NULL'),
(7, 29, 8, 1, 'NULL'),
(7, 35, 9, 1, 'NULL'),
(7, 43, 10, 1, 'NULL'),
(7, 47, 11, 1, 'NULL'),
(7, 54, 12, 1, 'NULL'),
(7, 56, 13, 1, 'NULL'),
(7, 62, 14, 1, 'NULL'),
(7, 68, 15, 1, 'NULL'),
(7, 75, 16, 1, 'NULL'),
(7, 86, 18, 1, 'NULL'),
(7, 103, 21, 1, 'NULL'),
(7, 92, 19, 1, 'NULL'),
(7, 79, 17, 1, 'NULL'),
(7, 98, 20, 1, 'NULL'),
(7, 115, 23, 1, 'NULL'),
(7, 110, 22, 1, 'NULL'),
(7, 122, 24, 1, 'NULL'),
(7, 128, 25, 1, 'NULL'),
(7, 136, 27, 1, 'NULL'),
(7, 142, 28, 1, 'NULL'),
(7, 147, 29, 1, 'NULL'),
(8, 8, 1, 1, 'NULL'),
(8, 13, 2, 1, 'NULL'),
(8, 16, 3, 1, 'NULL'),
(8, 158, 26, 1, 'NULL'),
(8, 62, 14, 1, 'NULL'),
(8, 42, 10, 1, 'NULL'),
(8, 19, 5, 1, 'NULL'),
(8, 23, 7, 1, 'NULL'),
(8, 29, 8, 1, 'NULL'),
(8, 18, 4, 1, 'NULL'),
(8, 36, 9, 1, 'NULL'),
(8, 48, 11, 1, 'NULL'),
(8, 56, 13, 1, 'NULL'),
(8, 68, 15, 1, 'NULL'),
(9, 159, 33, 2, 'Ninguno'),
(9, 8, 1, 1, 'NULL'),
(9, 13, 2, 1, 'NULL'),
(9, 16, 3, 1, 'NULL'),
(9, 18, 4, 1, 'NULL'),
(9, 19, 5, 1, 'NULL'),
(9, 21, 6, 1, 'NULL'),
(9, 23, 7, 1, 'NULL'),
(9, 29, 8, 1, 'NULL'),
(9, 35, 9, 1, 'NULL'),
(9, 42, 10, 1, 'NULL'),
(9, 48, 11, 1, 'NULL'),
(9, 153, 26, 1, 'NULL'),
(9, 154, 26, 1, 'NULL'),
(9, 155, 26, 1, 'NULL'),
(9, 156, 26, 1, 'NULL'),
(9, 158, 26, 1, 'NULL'),
(9, 53, 12, 1, 'NULL'),
(9, 55, 13, 1, 'NULL'),
(9, 61, 14, 1, 'NULL'),
(9, 141, 28, 1, 'NULL'),
(10, 8, 1, 1, 'NULL'),
(10, 13, 2, 1, 'NULL'),
(10, 16, 3, 1, 'NULL'),
(10, 17, 4, 1, 'NULL'),
(10, 19, 5, 1, 'NULL'),
(10, 21, 6, 1, 'NULL'),
(10, 23, 7, 1, 'NULL'),
(10, 29, 8, 1, 'NULL'),
(10, 35, 9, 1, 'NULL'),
(10, 41, 10, 1, 'NULL'),
(10, 47, 11, 1, 'NULL'),
(10, 53, 12, 1, 'NULL'),
(10, 55, 13, 1, 'NULL'),
(10, 61, 14, 1, 'NULL'),
(10, 67, 15, 1, 'NULL'),
(10, 73, 16, 1, 'NULL'),
(10, 79, 17, 1, 'NULL'),
(10, 85, 18, 1, 'NULL'),
(10, 91, 19, 1, 'NULL'),
(10, 97, 20, 1, 'NULL'),
(10, 103, 21, 1, 'NULL'),
(10, 109, 22, 1, 'NULL'),
(10, 115, 23, 1, 'NULL'),
(10, 121, 24, 1, 'NULL'),
(10, 127, 25, 1, 'NULL');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `survey`
--

CREATE TABLE `survey` (
  `id_survey` int(11) NOT NULL,
  `title_survey` text COLLATE utf8_spanish_ci NOT NULL,
  `description_survey` text COLLATE utf8_spanish_ci NOT NULL,
  `status_survey` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `created_date_survey` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `survey`
--

INSERT INTO `survey` (`id_survey`, `title_survey`, `description_survey`, `status_survey`, `created_date_survey`) VALUES
(1, 'Encuesta Estudiantes - Acreditación del Programa Académico de Ingeniería en Sistemas', 'El Programa Académico de Ingeniería en Sistemas se encuentra adelantando su proceso de autoevaluación con fines de acreditación.  La autoevaluación con fines de acreditación del Programa Académico de Ingeniería en Sistemas permite mostrar a la comunidad y a la sociedad las evidencias de su funcionamiento y sus compromisos con sus procesos académicos y administrativos, permitiendo identificar la correspondencia entre los propósitos formulados y los logros obtenidos, analizar los medios que dispone para el cumplimiento de sus propósitos, destacar las fortalezas e identificar oportunidades de mejora.  Su participación en calidad de Estudiante es trascendental para la autoevaluación con fines de acreditación del Programa puesto que sus aportes y percepción es información valiosa para el proceso. Cordialmente le solicitamos el diligenciamiento con la mayor objetividad posible del cuestionario que encuentra a continuación.   Agradecemos de antemano en nombre del Programa Académico de Ingeniería en Sistemas y de la Institución Universitaria Antonio José Camacho (UNIAJC) su participación.  ¡Juntos por la Excelencia Académica!  Autorización de Tratamiento y Protección de Datos Personales  Dando cumplimiento a lo dispuesto en la Ley 1581 de 2012, \" Por la cual se dictan disposiciones generales para la protección datos personales\" y de conformidad con lo señalado en el Decreto 1377 de 2013, con el diligenciamiento de la presente encuesta, manifiesto que he sido informado por la Institución Universitaria Antonio José Camacho UNIAJC de lo siguiente: 1. La UNIAJC actuará como responsable del tratamiento de datos personales de los cuales soy titular y que, conjunto separadamente podrá recolectar, usar y tratar mi información conforme a la Política de Tratamiento de Datos Personales. 2. Me ha sido informada la(s) finalidad(es) de la recolección de los datos personales, consignados en el presente documento. 3. Es de carácter facultativo o voluntario responder preguntas que versen sobre datos Sensibles o sobre menores de edad. 4. Mis derechos como titular de los datos son los previstos en la Constitución y la ley, especialmente el derecho a conocer, actualizar, rectificar y suprimir mi información personal, así como el derecho a revocar el consentimiento otorgado para el tratamiento de datos personales.  La UNIAJC garantizará la confidencialidad, libertad, seguridad, veracidad, transparencia, acceso y circulación restringida de mis datos. Teniendo en cuenta lo anterior, AUTORIZO de manera voluntaria, previa, explícita, informada e inequívoca la UNIAJC, para tratar mis datos personales consignados en el presente formato de encuesta, prueba de los cual será el diligenciamiento de la misma. La información obtenida para el Tratamiento de mis datos personales la he suministrado de forma voluntaria y es verídica.', 'on', '2020-07-29 15:59:22'),
(2, 'Preocupaciones frecuentes', 'Preocupaciones de los estudiantes de la UNIAJC', 'on', '2020-07-30 00:22:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `type_user` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `name` text COLLATE utf8_spanish_ci NOT NULL,
  `created_date_user` datetime NOT NULL,
  `restore_pass` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id_user`, `email`, `password`, `type_user`, `name`, `created_date_user`, `restore_pass`) VALUES
(2, 'camilo.davidortega@outlook.com', '4056152', 'Administrador', 'Juan Camilo David Ortega', '2020-07-30 22:57:56', ''),
(4, 'Janiier2000stiiven@gmail.com', '123456', 'Estudiante', 'Janier Steven ', '2020-08-02 22:40:03', '2721ce090a3f8e7d61aad1c545fbcf830af4a91e19f754b82b38042d72e3389a'),
(5, 'camilo.davidortega@gmail.com', '12345', 'Estudiante', 'Juan Camilo David Ortega', '2020-08-02 23:53:28', 'c514f95574588a1281494cf5004488ef6328f718607fafeb0df8268172e7b912'),
(6, 'ariasdaniel302@gmail.com', '12345', 'Estudiante', 'José Daniel Arias', '2020-08-10 18:24:08', ''),
(7, 'dfg0756@hotmail.com', '12345678910', 'Estudiante', 'Felipe George', '2020-08-12 20:24:47', ''),
(8, 'Davidonofre1010@gmail.com', '12345', 'Estudiante', 'David Onofre', '2020-08-13 16:39:58', ''),
(9, 'daaniielaa730@gmail.com', '12345', 'Estudiante', 'Andy Daniela ', '2020-08-13 16:50:30', ''),
(10, 'xascue@gmail.com', '12345', 'Estudiante', 'José Lamilla', '2020-08-13 17:00:50', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`id_answer`);

--
-- Indices de la tabla `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id_question`);

--
-- Indices de la tabla `survey`
--
ALTER TABLE `survey`
  ADD PRIMARY KEY (`id_survey`),
  ADD UNIQUE KEY `title_survey` (`title_survey`) USING HASH;

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `answer`
--
ALTER TABLE `answer`
  MODIFY `id_answer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT de la tabla `question`
--
ALTER TABLE `question`
  MODIFY `id_question` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `survey`
--
ALTER TABLE `survey`
  MODIFY `id_survey` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
