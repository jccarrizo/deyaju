-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 14-12-2021 a las 21:12:38
-- Versión del servidor: 5.7.34
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `deyaju`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('Administrador', '1', 1634682535),
('Administrador', '44', 1612719721),
('Cliente', '52', 1634754342),
('Modelo', '49', 1634682526),
('Modelo', '50', 1634570445);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/assignment/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/assignment/assign', 2, NULL, NULL, NULL, 1612727640, 1612727640),
('/admin/assignment/index', 2, NULL, NULL, NULL, 1612726956, 1612726956),
('/admin/assignment/revoke', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/assignment/view', 2, NULL, NULL, NULL, 1612727640, 1612727640),
('/admin/default/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/default/index', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/menu/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/menu/create', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/menu/delete', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/menu/index', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/menu/update', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/menu/view', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/permission/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/permission/assign', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/permission/create', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/permission/delete', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/permission/get-users', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/permission/index', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/permission/remove', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/permission/update', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/permission/view', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/role/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/role/assign', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/role/create', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/role/delete', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/role/get-users', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/role/index', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/role/remove', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/role/update', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/role/view', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/route/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/route/assign', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/route/create', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/route/index', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/route/refresh', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/route/remove', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/rule/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/rule/create', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/rule/delete', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/rule/index', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/rule/update', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/rule/view', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/site/*', 2, NULL, NULL, NULL, 1613053713, 1613053713),
('/admin/site/transmision', 2, NULL, NULL, NULL, 1613053798, 1613053798),
('/admin/user/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/user/activate', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/user/change-password', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/user/delete', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/user/index', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/user/login', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/user/logout', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/user/request-password-reset', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/user/reset-password', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/user/signup', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/admin/user/view', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/debug/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/debug/default/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/debug/default/db-explain', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/debug/default/download-mail', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/debug/default/index', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/debug/default/toolbar', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/debug/default/view', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/debug/user/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/debug/user/reset-identity', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/debug/user/set-identity', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/gii/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/gii/default/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/gii/default/action', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/gii/default/diff', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/gii/default/index', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/gii/default/preview', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/gii/default/view', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/modals/*', 2, NULL, NULL, NULL, 1613001880, 1613001880),
('/modals/index', 2, NULL, NULL, NULL, 1613001886, 1613001886),
('/model-introduction/*', 2, NULL, NULL, NULL, 1634923615, 1634923615),
('/modelo-galeria-premium/*', 2, NULL, NULL, NULL, 1634680566, 1634680566),
('/modelo-galeria/*', 2, NULL, NULL, NULL, 1613421780, 1613421780),
('/modelo-imagen-perfil/*', 2, NULL, NULL, NULL, 1634687210, 1634687210),
('/modelo/*', 2, NULL, NULL, NULL, 1613417704, 1613417704),
('/modelo/view', 2, NULL, NULL, NULL, 1634680756, 1634680756),
('/modeloinfopersonal/*', 2, NULL, NULL, NULL, 1634680686, 1634680686),
('/modeloinfoplataforma/*', 2, NULL, NULL, NULL, 1634680690, 1634680690),
('/site/*', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/site/about', 2, NULL, NULL, NULL, 1612730463, 1612730463),
('/site/dashboard', 2, NULL, NULL, NULL, 1613409063, 1613409063),
('/site/error', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/site/index', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/site/login', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/site/logout', 2, NULL, NULL, NULL, 1612727641, 1612727641),
('/transmision/*', 2, NULL, NULL, NULL, 1613054976, 1613054976),
('/transmision/index', 2, NULL, NULL, NULL, 1613054976, 1613054976),
('Administrador', 1, 'Super Administrador', NULL, NULL, 1612719721, 1612724744),
('Cliente', 1, 'Cliente consumidor', NULL, NULL, 1612730002, 1612730002),
('createPost', 2, 'Crear Post', NULL, NULL, 1612719721, 1612719721),
('deletePost', 2, 'Eliminar Post', NULL, NULL, 1612719721, 1612719721),
('Estudio', 1, 'Estudio', NULL, NULL, 1614264185, 1614264185),
('Modelo', 1, 'Modelo de la plataforma', NULL, NULL, 1613408766, 1613408766),
('updatePost', 2, 'Actualizar Post', NULL, NULL, 1612719721, 1612719721),
('Usuario', 1, 'Usuario común', NULL, NULL, 1612719721, 1612724823),
('viewPost', 2, 'Ver Post', NULL, NULL, 1612719721, 1612719721);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('Administrador', '/*'),
('Modelo', '/model-introduction/*'),
('Modelo', '/modelo-galeria-premium/*'),
('Modelo', '/modelo-galeria/*'),
('Modelo', '/modelo-imagen-perfil/*'),
('Modelo', '/modelo/*'),
('Modelo', '/modelo/view'),
('Modelo', '/modeloinfopersonal/*'),
('Modelo', '/modeloinfoplataforma/*'),
('Administrador', '/site/*'),
('Usuario', '/site/about'),
('Cliente', '/site/index'),
('Usuario', '/site/index'),
('Cliente', '/site/login'),
('Usuario', '/site/login'),
('Cliente', '/site/logout'),
('Usuario', '/site/logout'),
('Modelo', '/transmision/*'),
('Administrador', 'Cliente'),
('Administrador', 'createPost'),
('Cliente', 'createPost'),
('Modelo', 'createPost'),
('Usuario', 'createPost'),
('Administrador', 'deletePost'),
('Modelo', 'deletePost'),
('Administrador', 'updatePost'),
('Modelo', 'updatePost'),
('Administrador', 'Usuario'),
('Administrador', 'viewPost'),
('Cliente', 'viewPost'),
('Modelo', 'viewPost'),
('Usuario', 'viewPost');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `identificacion` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `alias` varchar(255) NOT NULL,
  `direccion` text,
  `observacion` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `identificacion`, `nombre`, `alias`, `direccion`, `observacion`, `created_at`, `updated_at`) VALUES
(1, '000', 'Genérico', 'Genérico', 'N/A', 'N/A', '2021-12-12 01:46:41', '2021-12-13 14:14:06'),
(2, '14206987', 'Juan Carrizo', 'Juanito', 'Facatativá', NULL, '2021-12-12 14:05:40', '2021-12-13 14:31:18'),
(3, '19989164', 'Yarien', 'Yari', 'Facatativá', NULL, '2021-12-12 14:06:34', '2021-12-12 14:06:34'),
(4, '1234567890', 'Paula', '', 'Facatativá', NULL, '2021-12-12 14:11:01', '2021-12-12 16:55:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `motivo` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `fuera_inventario` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `devoluciones`
--

INSERT INTO `devoluciones` (`id`, `id_producto`, `qty`, `motivo`, `fecha`, `fuera_inventario`) VALUES
(1, 3, 5, 'Explotaron en la nevera', '2021-12-11 22:48:20', 1),
(2, 4, 5, 'Vencida', '2021-12-11 22:44:08', 1),
(3, 4, 5, 'Vencida', '2021-12-11 22:43:08', 1),
(4, 5, 6, 'Cancelada', '2021-12-11 23:05:37', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `idioma`
--

CREATE TABLE `idioma` (
  `id_idioma` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Polar', 'Alimentos,Cervezas'),
(2, 'Quaker', 'Alimentos'),
(3, 'Underwood', 'Alimantos enlatados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id` int(11) NOT NULL,
  `medida` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `simbolo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id`, `medida`, `descripcion`, `simbolo`) VALUES
(1, 'Mililitros', 'Unidad en Mililitros', 'ml.'),
(2, 'Kilo gramo', 'Kilo gramo', 'kg.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `channel` varchar(50) COLLATE utf8mb4_bin NOT NULL,
  `from_user_id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_bin NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `mensaje` text COLLATE utf8mb4_bin NOT NULL,
  `channel_type` int(2) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `sobre_nombre` varchar(255) DEFAULT NULL,
  `precio` float NOT NULL,
  `precio_mayor` float NOT NULL,
  `medida_id` int(11) NOT NULL,
  `medida_valor` float NOT NULL,
  `id_marca` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `sobre_nombre`, `precio`, `precio_mayor`, `medida_id`, `medida_valor`, `id_marca`, `created_at`, `update_at`) VALUES
(3, 'Cerveza Polar', 'Polar Negra', 2000, 1000, 1, 250, 1, '2021-12-05 21:34:28', '2021-12-11 21:17:36'),
(4, 'Avena', 'Avena Quaker', 2500, 2000, 2, 0.5, 2, '2021-12-05 21:34:28', '2021-12-05 21:34:48'),
(5, 'Cerveza Solera Verde', 'Solera verde', 2500, 1000, 1, 250, 1, '2021-12-05 21:41:12', '2021-12-05 21:41:12'),
(9, 'Diablitos Underwood', 'Diablitos', 3000, 1500, 2, 0.2, 3, '2021-12-14 20:04:40', '2021-12-14 20:04:40'),
(10, 'Mayonesa Mavesa', '', 3500, 2500, 2, 0.5, 1, '2021-12-14 20:08:31', '2021-12-14 20:08:31'),
(11, 'Mantequilla Mavesa', '', 3200, 2200, 2, 0.5, 1, '2021-12-14 20:10:21', '2021-12-14 20:10:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stock`
--

CREATE TABLE `stock` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `precio` float NOT NULL,
  `precio_mayor` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `stock`
--

INSERT INTO `stock` (`id`, `id_producto`, `precio`, `precio_mayor`, `cantidad`, `created_at`, `update_at`) VALUES
(2, 3, 1500, 750, 32, '2021-12-05 21:14:37', '2021-12-05 22:23:28'),
(3, 4, 2500, 1200, 20, '2021-12-05 21:22:40', '2021-12-05 22:23:32'),
(4, 5, 2500, 1200, 16, '2021-12-05 21:41:12', '2021-12-05 22:23:38'),
(5, 3, 1800, 900, 32, '2021-12-11 20:09:49', '2021-12-11 20:09:49'),
(6, 3, 1800, 900, 16, '2021-12-11 20:44:14', '2021-12-11 21:04:44'),
(7, 3, 1800, 900, 10, '2021-12-11 21:13:33', '2021-12-11 21:13:33'),
(8, 3, 1900, 950, 32, '2021-12-11 21:15:11', '2021-12-11 21:15:11'),
(9, 3, 2000, 1000, 10, '2021-12-11 21:17:36', '2021-12-11 21:17:36'),
(10, 3, 2000, 1000, 36, '2021-12-11 22:54:44', '2021-12-11 22:54:44'),
(11, 9, 3000, 1500, 50, '2021-12-14 20:04:59', '2021-12-14 20:04:59'),
(12, 10, 3500, 2500, 30, '2021-12-14 20:08:49', '2021-12-14 20:08:49'),
(13, 11, 3200, 2200, 25, '2021-12-14 20:10:34', '2021-12-14 20:14:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `verification_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `verification_token`, `created_at`, `updated_at`) VALUES
(1, 'juan', 'Rv5WQZP2pjGQGmzH1q1NejD7zbgjW_Gx', '$2y$13$0cnK0XV5f7TXonfX0TrvJ.CCwKG4KEdxfrkMobiq58ZnAYhoXOTTS', NULL, 'juan@admin.com', 10, '', 1612709788, 1612709788),
(44, 'yesid', '4qO8f1yyn5t6vZ28_03MYxNvp3YQ-kH7', '$2y$13$3NHEZFhILx4HPJr3Old/0uNEj.jr4ahf5lfkzRV9teVnHhGwqgsSS', '1jxD5Ld3oSxEFCjz8kjEof0xbG1Uuf-n_1631655594', 'yesidlavila@gmail.com', 10, 'Fz2ifVZTKrhtFCzzlUksiLzpxd1UHscB_1614299566', 1614299569, 1631655594);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_info`
--

CREATE TABLE `user_info` (
  `id_usuario` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `cantidad` float NOT NULL,
  `valor_real` float NOT NULL,
  `valor_venta` float NOT NULL,
  `valor_unidad` float NOT NULL,
  `observacion` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `idx-auth_assignment-user_id` (`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `idioma`
--
ALTER TABLE `idioma`
  ADD PRIMARY KEY (`id_idioma`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medida_id` (`medida_id`),
  ADD KEY `id_marca` (`id_marca`);

--
-- Indices de la tabla `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK id productos` (`id_producto`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_user` (`id_user`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `idioma`
--
ALTER TABLE `idioma`
  MODIFY `id_idioma` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `stock`
--
ALTER TABLE `stock`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT de la tabla `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD CONSTRAINT `devoluciones_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marcas` (`id`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`medida_id`) REFERENCES `medidas` (`id`);

--
-- Filtros para la tabla `stock`
--
ALTER TABLE `stock`
  ADD CONSTRAINT `stock_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `user_info_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `ventas_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
