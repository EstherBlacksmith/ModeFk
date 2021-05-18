-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-05-2021 a las 13:14:38
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `modefk`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_emergencias`
--

CREATE TABLE `contacto_emergencias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `primerApellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ejercicioHecho` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contacto_emergencias`
--

INSERT INTO `contacto_emergencias` (`id`, `created_at`, `updated_at`, `nombre`, `primerApellido`, `telefono`, `user_id`, `ejercicioHecho`) VALUES
(1, '2021-05-18 07:50:12', '2021-05-18 07:50:12', 'Esther', 'Herrero', '650542290', 41, '2021-05-18 11:50:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicios`
--

CREATE TABLE `ejercicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ejercicios`
--

INSERT INTO `ejercicios` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES
(40, '2021-05-18 09:32:36', '2021-05-18 09:32:36', 'Aplaude para relajarte', 'Comienza a aplaudir desde la pelvis, realizando con las manos y los brazos un círculo que sube por la parte izquierda del cuerpo hasta llegar a la cabeza. En este recorrido aplaude siete veces.'),
(41, '2021-05-18 09:32:58', '2021-05-18 09:32:58', 'Abre tu respiración', 'Escucha tu respiración y siente en qué lugar del tronco se expande al inspirar. \r\nColoca la mano derecha sobre ese punto y realiza cinco respiraciones. Siente cómo el aire mueve la mano arriba y abajo.'),
(42, '2021-05-18 09:33:31', '2021-05-18 09:33:31', 'Palmea para despejarte', 'Pon las palmas de las manos una frente a la otra y frótalas realizando círculos.\r\nCon las muñecas relajadas, palmea vigorosamente con las puntas de los dedos la zona del pulmón, bajo las axilas y la parte alta de la espalda, hasta donde llegues.'),
(43, '2021-05-18 09:34:39', '2021-05-18 09:34:39', 'Sube los omoplatos y destensa', 'Con el tronco hacia delante realiza un círculo con los omoplatos dirigiendo los hombros en dirección a las orejas, al techo y hacia atrás hacia las nalgas.\r\nAguanta esta posición cinco segundos y después deja caer hombros, omoplatos y brazos.'),
(44, '2021-05-18 09:35:17', '2021-05-18 09:35:17', 'Aprieta y suelta los pies', 'De pie o sentado, con las piernas flexionadas, presiona levemente con los dedos del pie izquierdo contra el suelo y suelta.\r\nRepite cinco veces y observa las diferencias con el otro pie.'),
(47, '2021-05-18 09:49:55', '2021-05-18 09:49:55', 'Haz vibrar la columna vertebral', 'Aguanta la respiración y cuenta hasta cuatro.\r\nSuelta la fuerza de los brazos y vibra un poco a partir del talón. Cuando llegues al suelo continúa haciendo vibrar las rodillas para que transmitan la vibración a la cadera, tronco, cabeza y brazos.'),
(48, '2021-05-18 09:52:57', '2021-05-18 09:52:57', 'Segmenta tus objetivos', 'Divídelos en objetivos más pequeños. Éstos, a su vez,  vuelve a trocearlos. Comprueba que cada pequeño objetivo es ahora más asumible y fácil de hacer'),
(49, '2021-05-18 09:53:39', '2021-05-18 09:53:39', 'Céntrate en la vida fuera de casa', 'Tanto el ocio en compañía como en solitario nos ayudan a movernos de la zona cómoda y ganar en bienestar.  Haz planes con amigos, visita exposiciones o viaja a pueblos cercanos.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ejercicio_con_estados`
--

CREATE TABLE `ejercicio_con_estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `estado_id` bigint(20) UNSIGNED NOT NULL,
  `ejercicio_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ejercicio_con_estados`
--

INSERT INTO `ejercicio_con_estados` (`id`, `created_at`, `updated_at`, `estado_id`, `ejercicio_id`) VALUES
(1, '2021-05-18 09:32:36', '2021-05-18 09:32:36', 46, 40),
(2, '2021-05-18 09:32:58', '2021-05-18 09:32:58', 46, 41),
(3, '2021-05-18 09:33:31', '2021-05-18 09:33:31', 46, 42),
(4, '2021-05-18 09:34:39', '2021-05-18 09:34:39', 45, 43),
(5, '2021-05-18 09:35:17', '2021-05-18 09:35:17', 45, 44),
(8, '2021-05-18 09:48:56', '2021-05-18 09:48:56', 45, 41),
(9, '2021-05-18 09:49:55', '2021-05-18 09:49:55', 46, 47),
(10, '2021-05-18 09:51:02', '2021-05-18 09:51:02', 44, 40),
(11, '2021-05-18 09:51:04', '2021-05-18 09:51:04', 44, 42),
(12, '2021-05-18 09:52:57', '2021-05-18 09:52:57', 44, 48),
(13, '2021-05-18 09:53:39', '2021-05-18 09:53:39', 44, 49),
(14, '2021-05-18 09:55:44', '2021-05-18 09:55:44', 44, 41);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nombre` char(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` char(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `created_at`, `updated_at`, `nombre`, `descripcion`) VALUES
(44, '2021-05-18 09:29:15', '2021-05-18 09:29:15', 'Apatía', 'Impasibilidad del ánimo. Dejadez, indolencia, falta de vigor o energía.'),
(45, '2021-05-18 09:30:06', '2021-05-18 09:30:06', 'Nervios', 'Estado pasajero de excitación nerviosa. Incapacidad para mantener la concentración.'),
(46, '2021-05-18 09:30:42', '2021-05-18 09:30:42', 'Ansiedad', 'Estado de agitación, inquietud o zozobra del ánimo.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_03_29_170507_create_estados_table', 2),
(5, '2021_03_29_171110_add_estados_table', 3),
(6, '2021_03_29_171312_add_estados_table', 4),
(7, '2021_03_31_105755_create_ejercicios_table', 5),
(8, '2021_03_31_105951_add_ejercicios_foreign_key', 6),
(9, '2021_03_31_113308_alter_table_ejercicios', 7),
(10, '2021_03_31_113912_alter_table_ejercicios-2', 8),
(11, '2021_03_31_170612_create_registro_ejercicios_table', 9),
(12, '2021_04_11_115901_alter_table_registro_ejercicios_add_user_id', 10),
(13, '2021_04_11_155159_alter_table_user_add_rol', 11),
(14, '2021_05_03_152232_create_contacto_emergencias_table', 12),
(15, '2021_05_03_155440_create_ejercicio_con_estados_table', 13),
(16, '2021_05_03_155930_modify_column_datetime_contacto_emergencias_table', 13),
(17, '2021_05_03_160702_add_foreign_keys_ejercicios_con_estados_table', 14),
(18, '2021_05_12_153608_delete_id_estado_ejercicios_table', 15),
(19, '2021_05_12_154016_delete_id_estado_ejercicios_table-2', 16),
(20, '2021_05_12_154225_delete_id_estado_ejercicios_table-3', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_ejercicios`
--

CREATE TABLE `registro_ejercicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `ejercicio_id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `ejercicioHecho` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registro_ejercicios`
--

INSERT INTO `registro_ejercicios` (`id`, `created_at`, `updated_at`, `ejercicio_id`, `user_id`, `ejercicioHecho`) VALUES
(1, '2021-05-18 10:46:32', '2021-05-18 10:46:32', 41, 41, '2021-05-18 12:46:32'),
(2, '2021-05-18 11:10:38', '2021-05-18 11:10:38', 48, 42, '2021-05-18 13:10:38'),
(3, '2021-05-18 11:10:42', '2021-05-18 11:10:42', 48, 42, '2021-05-18 13:10:42'),
(4, '2021-05-18 11:10:49', '2021-05-18 11:10:49', 44, 42, '2021-05-18 13:10:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rol` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `rol`) VALUES
(41, 'admin', 'admin@gmail.com', NULL, '$2y$10$vCQXvZb9mvCJ7k8UvpVUWuo.D9kK40B7D/05zv3o4RRvEMtzxMzjO', NULL, '2021-05-18 07:26:04', '2021-05-18 07:26:04', 'admin'),
(42, 'Esther', 'arikhel@gmail.com', NULL, '$2y$10$ROpw5aY8HJ713Oe1e/G/ZO8HAjvobUdcQ2jGKQMeL5nuFIqDLHDYO', NULL, '2021-05-18 09:10:14', '2021-05-18 09:10:14', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacto_emergencias`
--
ALTER TABLE `contacto_emergencias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacto_emergencias_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ejercicio_con_estados`
--
ALTER TABLE `ejercicio_con_estados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ejercicio_con_estados_estado_id_foreign` (`estado_id`),
  ADD KEY `ejercicio_con_estados_ejercicio_id_foreign` (`ejercicio_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `registro_ejercicios`
--
ALTER TABLE `registro_ejercicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registro_ejercicios_ejercicio_id_foreign` (`ejercicio_id`),
  ADD KEY `registro_ejercicios_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacto_emergencias`
--
ALTER TABLE `contacto_emergencias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `ejercicios`
--
ALTER TABLE `ejercicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT de la tabla `ejercicio_con_estados`
--
ALTER TABLE `ejercicio_con_estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `registro_ejercicios`
--
ALTER TABLE `registro_ejercicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacto_emergencias`
--
ALTER TABLE `contacto_emergencias`
  ADD CONSTRAINT `contacto_emergencias_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ejercicio_con_estados`
--
ALTER TABLE `ejercicio_con_estados`
  ADD CONSTRAINT `ejercicio_con_estados_ejercicio_id_foreign` FOREIGN KEY (`ejercicio_id`) REFERENCES `ejercicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ejercicio_con_estados_estado_id_foreign` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_ejercicios`
--
ALTER TABLE `registro_ejercicios`
  ADD CONSTRAINT `registro_ejercicios_ejercicio_id_foreign` FOREIGN KEY (`ejercicio_id`) REFERENCES `ejercicios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registro_ejercicios_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
