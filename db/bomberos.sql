-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2022 a las 21:33:22
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bomberos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendar`
--

CREATE TABLE `calendar` (
  `codigo` int(11) NOT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `canton` varchar(50) NOT NULL,
  `parroquia` varchar(50) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `kmsalida` varchar(10) DEFAULT NULL,
  `kmllegada` varchar(10) DEFAULT NULL,
  `inicio` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `fichaemergencia` varchar(50) NOT NULL,
  `alertante` varchar(50) NOT NULL,
  `direccionevento` varchar(100) NOT NULL,
  `sector` varchar(50) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `accionrespuesta` varchar(500) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `afectacion` varchar(1000) NOT NULL,
  `recursosmovilizados` varchar(1000) NOT NULL,
  `personalasistio` varchar(1000) NOT NULL,
  `fuenteinformacion` varchar(100) NOT NULL,
  `observacion` varchar(5000) NOT NULL,
  `colortexto` varchar(7) DEFAULT NULL,
  `colorfondo` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calendar_exit`
--

CREATE TABLE `calendar_exit` (
  `codigo` int(11) NOT NULL,
  `provincia` varchar(50) DEFAULT NULL,
  `canton` varchar(50) NOT NULL,
  `parroquia` varchar(50) DEFAULT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `kmsalida` varchar(10) DEFAULT NULL,
  `kmllegada` varchar(10) DEFAULT NULL,
  `inicio` datetime DEFAULT NULL,
  `fin` datetime DEFAULT NULL,
  `fichaemergencia` varchar(50) NOT NULL,
  `alertante` varchar(50) NOT NULL,
  `direccionevento` varchar(100) NOT NULL,
  `sector` varchar(50) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `accionrespuesta` varchar(500) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `afectacion` varchar(1000) NOT NULL,
  `recursosmovilizados` varchar(1000) NOT NULL,
  `personalasistio` varchar(1000) NOT NULL,
  `fuenteinformacion` varchar(100) NOT NULL,
  `observacion` varchar(5000) NOT NULL,
  `colortexto` varchar(7) DEFAULT NULL,
  `colorfondo` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comodato`
--

CREATE TABLE `comodato` (
  `id` int(11) NOT NULL,
  `doc_id` text DEFAULT NULL,
  `nombre` text DEFAULT NULL,
  `telefono` text DEFAULT NULL,
  `horas` int(11) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informespreliminares`
--

CREATE TABLE `informespreliminares` (
  `id` int(11) NOT NULL,
  `parteid` int(11) DEFAULT NULL,
  `provincia` text CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `canton` text DEFAULT NULL,
  `parroquia` text DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `fichaemergencia` text DEFAULT NULL,
  `alertante` text DEFAULT NULL,
  `direccionevento` text DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `referencia` text NOT NULL,
  `accionrespuesta` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `afectacion` text DEFAULT NULL,
  `recursosmovilizados` text DEFAULT NULL,
  `personalasistio` text DEFAULT NULL,
  `fuenteinformacion` text DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `horainicio` time DEFAULT NULL,
  `horafin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informestrabajo`
--

CREATE TABLE `informestrabajo` (
  `id` int(11) NOT NULL,
  `provincia` text CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `canton` text DEFAULT NULL,
  `parroquia` text DEFAULT NULL,
  `titulo` text DEFAULT NULL,
  `fechainicio` date DEFAULT NULL,
  `fechafin` date DEFAULT NULL,
  `fichaemergencia` text DEFAULT NULL,
  `alertante` text DEFAULT NULL,
  `direccionevento` text DEFAULT NULL,
  `sector` text DEFAULT NULL,
  `referencia` text NOT NULL,
  `accionrespuesta` text DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `afectacion` text DEFAULT NULL,
  `recursosmovilizados` text DEFAULT NULL,
  `personalasistio` text DEFAULT NULL,
  `fuenteinformacion` text DEFAULT NULL,
  `observacion` text DEFAULT NULL,
  `horainicio` time DEFAULT NULL,
  `horafin` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inspectoria`
--

CREATE TABLE `inspectoria` (
  `id` int(11) NOT NULL,
  `fecha` date DEFAULT NULL,
  `ra_social` text DEFAULT NULL,
  `porp_admin` text DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `parroquia` text DEFAULT NULL,
  `barrio` text DEFAULT NULL,
  `manzana` text NOT NULL,
  `local` text NOT NULL,
  `ruc_ci` text NOT NULL,
  `telefono` text NOT NULL,
  `area_general` text NOT NULL,
  `area_local` text NOT NULL,
  `prop_arriendo` text NOT NULL,
  `pisos_dep` text NOT NULL,
  `acti_ocup` text NOT NULL,
  `tipo_local` text NOT NULL,
  `citaciones` text NOT NULL,
  `construccion` text NOT NULL,
  `cubierta` text NOT NULL,
  `se_sobre_libre` text NOT NULL,
  `se_sobre_entub_plast` text NOT NULL,
  `se_sobre_entub_metal` text NOT NULL,
  `se_empot` text NOT NULL,
  `se_prot_bip` text NOT NULL,
  `se_prot_break` text NOT NULL,
  `se_prot_cate` text NOT NULL,
  `ex_pqs_5l` text NOT NULL,
  `ex_pqs_10l` text NOT NULL,
  `ex_pqs_20l` text NOT NULL,
  `ex_pqs_50l` text NOT NULL,
  `ex_pqs_100l` text NOT NULL,
  `ex_pqs_150l` text NOT NULL,
  `ex_co2_5l` text NOT NULL,
  `ex_co2_10l` text NOT NULL,
  `ex_co2_20l` text NOT NULL,
  `ex_co2_25l` text NOT NULL,
  `ex_co2_50l` text NOT NULL,
  `ex_co2_100l` text NOT NULL,
  `ex_co2_150l` text NOT NULL,
  `ex_co2_pqs` text NOT NULL,
  `luz_emergencia` text NOT NULL,
  `senaletica` text NOT NULL,
  `aea_co_do` text NOT NULL,
  `aea_co_ind` text NOT NULL,
  `aea_cocineta` text NOT NULL,
  `aea_horno` text NOT NULL,
  `aea_parrilla` text NOT NULL,
  `aea_otro` text NOT NULL,
  `observacion` text NOT NULL,
  `inspector` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_admin`
--

CREATE TABLE `inventario_admin` (
  `id` int(11) NOT NULL,
  `nombre_del_bien` text DEFAULT NULL,
  `unidades` text DEFAULT NULL,
  `modelo` text DEFAULT NULL,
  `marcas` text DEFAULT NULL,
  `serie` text DEFAULT NULL,
  `vida_util` text DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `ano` text DEFAULT NULL,
  `responsable` text DEFAULT NULL,
  `t_compra` text DEFAULT NULL,
  `estado` text DEFAULT NULL,
  `p_unitario` text DEFAULT NULL,
  `p_total` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_conta`
--

CREATE TABLE `inventario_conta` (
  `id` int(11) NOT NULL,
  `nombre_del_bien` text DEFAULT NULL,
  `unidades` text DEFAULT NULL,
  `modelo` text DEFAULT NULL,
  `marcas` text DEFAULT NULL,
  `serie` text DEFAULT NULL,
  `vida_util` text DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `ano` text DEFAULT NULL,
  `responsable` text DEFAULT NULL,
  `t_compra` text DEFAULT NULL,
  `estado` text DEFAULT NULL,
  `p_unitario` text DEFAULT NULL,
  `p_total` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_jef`
--

CREATE TABLE `inventario_jef` (
  `id` int(11) NOT NULL,
  `nombre_del_bien` text DEFAULT NULL,
  `unidades` text DEFAULT NULL,
  `modelo` text DEFAULT NULL,
  `marcas` text DEFAULT NULL,
  `serie` text DEFAULT NULL,
  `vida_util` text DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `ano` text DEFAULT NULL,
  `responsable` text DEFAULT NULL,
  `t_compra` text DEFAULT NULL,
  `estado` text DEFAULT NULL,
  `p_unitario` text DEFAULT NULL,
  `p_total` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_op`
--

CREATE TABLE `inventario_op` (
  `id` int(11) NOT NULL,
  `nombre_del_bien` text CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `unidades` text DEFAULT NULL,
  `modelo` text DEFAULT NULL,
  `marcas` text DEFAULT NULL,
  `serie` text DEFAULT NULL,
  `vida_util` text DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `ano` text DEFAULT NULL,
  `responsable` text DEFAULT NULL,
  `t_compra` text DEFAULT NULL,
  `estado` text DEFAULT NULL,
  `p_unitario` text DEFAULT NULL,
  `p_total` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_secr`
--

CREATE TABLE `inventario_secr` (
  `id` int(11) NOT NULL,
  `nombre_del_bien` text DEFAULT NULL,
  `unidades` text DEFAULT NULL,
  `modelo` text DEFAULT NULL,
  `marcas` text DEFAULT NULL,
  `serie` text DEFAULT NULL,
  `vida_util` text DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `ano` text DEFAULT NULL,
  `responsable` text DEFAULT NULL,
  `t_compra` text DEFAULT NULL,
  `estado` text DEFAULT NULL,
  `p_unitario` text DEFAULT NULL,
  `p_total` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_tes`
--

CREATE TABLE `inventario_tes` (
  `id` int(11) NOT NULL,
  `nombre_del_bien` text DEFAULT NULL,
  `unidades` text DEFAULT NULL,
  `modelo` text DEFAULT NULL,
  `marcas` text DEFAULT NULL,
  `serie` text DEFAULT NULL,
  `vida_util` text DEFAULT NULL,
  `fecha_compra` date DEFAULT NULL,
  `ano` text DEFAULT NULL,
  `responsable` text DEFAULT NULL,
  `t_compra` text DEFAULT NULL,
  `estado` text DEFAULT NULL,
  `p_unitario` text DEFAULT NULL,
  `p_total` text DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `media`
--

CREATE TABLE `media` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_informes` int(11) NOT NULL,
  `file` varchar(500) NOT NULL,
  `path` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `req_bienes`
--

CREATE TABLE `req_bienes` (
  `id` int(11) NOT NULL,
  `solicitud_id` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `servidorp` text DEFAULT NULL,
  `unidad` text DEFAULT NULL,
  `objeto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `req_ser`
--

CREATE TABLE `req_ser` (
  `id` int(11) NOT NULL,
  `solicitud_id` text DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `servidorp` text DEFAULT NULL,
  `unidad` text DEFAULT NULL,
  `objeto` text DEFAULT NULL,
  `codigo_cpc` text DEFAULT NULL,
  `se_en_ca` text DEFAULT NULL,
  `se_en_pac` text DEFAULT NULL,
  `antecedente` text DEFAULT NULL,
  `objetivos` text DEFAULT NULL,
  `alcance` text DEFAULT NULL,
  `met_tra` text DEFAULT NULL,
  `inf_en_con` text DEFAULT NULL,
  `p_s_esp` text DEFAULT NULL,
  `pl_cro` text DEFAULT NULL,
  `p_e_r` text DEFAULT NULL,
  `pre_pag` text DEFAULT NULL,
  `inf_op` text DEFAULT NULL,
  `presentado` text DEFAULT NULL,
  `autorizado` text DEFAULT NULL,
  `elaborado` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_menus`
--

CREATE TABLE `sys_menus` (
  `menus_id_i` int(50) NOT NULL,
  `menus_html_href_v` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `menus_html_icon_v` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `menus_nombre_v` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `menus_es_treview` int(10) DEFAULT 0,
  `menus_orden_i` int(10) DEFAULT 0,
  `menus_id_v` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `menus_reporte_i` int(3) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sys_menus`
--

INSERT INTO `sys_menus` (`menus_id_i`, `menus_html_href_v`, `menus_html_icon_v`, `menus_nombre_v`, `menus_es_treview`, `menus_orden_i`, `menus_id_v`, `menus_reporte_i`) VALUES
(1, 'dashboard', 'fa fa-home', 'Inicio', 0, 1, 'inicio', 0),
(2, 'users', 'fa fa-users', 'Usuarios', 0, 2, 'users', 0),
(26, 'perfiles', 'fa fa-lock', 'Perfiles', 0, 3, 'perfiles', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_perfiles`
--

CREATE TABLE `sys_perfiles` (
  `per_id_i` int(11) NOT NULL,
  `per_descripcion_v` varchar(255) NOT NULL,
  `per_estado_i` int(11) NOT NULL,
  `per_adiciona_i` int(2) NOT NULL DEFAULT 0,
  `per_edita_i` int(2) NOT NULL DEFAULT 0,
  `per_elimina_i` int(2) NOT NULL DEFAULT 0,
  `per_superadin_i` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sys_perfiles`
--

INSERT INTO `sys_perfiles` (`per_id_i`, `per_descripcion_v`, `per_estado_i`, `per_adiciona_i`, `per_edita_i`, `per_elimina_i`, `per_superadin_i`) VALUES
(1, 'Administrador', 1, 1, 1, 1, 0),
(2, 'Agente de Bombero #1', 1, 0, 1, 0, 0),
(4, 'Agente de Bomberos 2', 1, 1, 1, 0, 0),
(5, 'Agente de Bomberos Eliminador', 1, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_perfiles_menu`
--

CREATE TABLE `sys_perfiles_menu` (
  `pem_id_i` int(11) NOT NULL,
  `pem_per_id_i` int(11) NOT NULL,
  `pem_men_id_i` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sys_perfiles_menu`
--

INSERT INTO `sys_perfiles_menu` (`pem_id_i`, `pem_per_id_i`, `pem_men_id_i`) VALUES
(9, 3, 2),
(17, 2, 1),
(18, 2, 2),
(19, 1, 1),
(20, 1, 2),
(21, 1, 26),
(22, 4, 2),
(23, 5, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sys_submenu`
--

CREATE TABLE `sys_submenu` (
  `submenu_id` int(11) NOT NULL,
  `submenu_nombre` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `submenu_menu_id` int(10) DEFAULT NULL,
  `submenu_icon` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `submenu_href` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `submenu_id_v` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sys_submenu`
--

INSERT INTO `sys_submenu` (`submenu_id`, `submenu_nombre`, `submenu_menu_id`, `submenu_icon`, `submenu_href`, `submenu_id_v`) VALUES
(2, 'Informe de Pagos', 9, 'fa fa-circle', 'pagosempleados', 'pagosempleados'),
(5, 'Consolidado de Incapacidades', 13, 'fa fa-money', 'consolidadoinc', 'consolidadoinc'),
(6, 'Incapacidades por Estado', 13, 'fa fa-money', 'incapacidadesestado', 'incapacidadesestado'),
(7, 'Incapacidades por Empleados', 13, 'fa fa-money', 'incapacidadesEmpleados', 'incapacidadesEmpleados'),
(8, 'Estadisticas', 12, 'fa fa-circle', 'estadisticas', 'estadisticasEmpleados'),
(9, 'Incapacidades por Administradora', 13, 'fa fa-money', 'administradoras', 'administradoras'),
(10, 'Incapacidades por Mes', 12, 'fa fa-circle', 'mesincapacidades', 'mesincapacidades'),
(11, 'Incapacidades por centro costo', 13, 'fa fa-money', 'centrocostoRep', 'centrocostoRep'),
(12, 'Detalle de Pagos por Semestre', 14, 'fa fa-circle', 'detpagoxmes', 'detpagoxmes'),
(13, 'Detalle de Pagos Consolidado', 14, 'fa fa-circle', 'gerencial', 'gerencial'),
(14, 'Dashboard', 19, 'fa fa-circle', 'dashboardcrm', 'dashboardcrm'),
(15, 'Prospectos', 19, 'fa fa-circle', 'prospectoscrm', 'prospectoscrm'),
(18, 'Reporte Cargue de Nomina', 13, 'fa fa-money', 'repCarNom', 'repCarNom'),
(19, 'New Gerencial', 14, 'fa fa-circle', 'gerencialNew', 'gerencialNew'),
(20, 'Casos Especiales', 12, 'fa fa-circle', 'casosespeciales', 'casosespeciales'),
(21, 'Informe Gerencial', 14, 'fa fa-circle', 'informeGerencial', 'informeGerencial'),
(22, 'Empresa', 6, 'fa fa-circle', 'clientes', 'clientesempresa'),
(23, 'Colaboradores', 6, 'fa fa-circle', 'empleados', 'empleados'),
(25, 'Gestión', 7, 'fa fa-circle', 'incapacidades', 'incapacidades'),
(27, 'Usuarios', 8, 'fa fa-circle', 'usuariosadministradora', 'usuariosadministradora'),
(28, 'Formatos', 8, 'fa fa-circle', 'entidades', 'entidades'),
(29, 'Cartera', 8, 'fa fa-circle', 'cartera', 'cartera'),
(30, 'Configuración', 8, 'fa fa-circle', 'notificaciones', 'notificaciones'),
(31, 'U. Internos', 10, 'fa fa-circle', 'usuarios', 'usuariosInternos'),
(32, 'U. Externos', 10, 'fa fa-circle', 'usuariosExt', 'usuariosExt'),
(33, 'Informe consolidado de Saldos', 13, 'fa fa-money', 'consoliadosaldos', 'consoliadosaldos'),
(34, 'Informe Gestión Especial', 14, 'fa fa-circle', 'infoGesEsp', 'infoGesEsp'),
(35, 'Informe Gestión Especial Anual', 14, 'fa fa-circle', 'infoGesEspAnu', 'infoGesEspAnu'),
(36, 'Informe Cartera Antigua', 9, 'fa fa-circle', 'info-cartera-antigua', 'info-cartera-antigua');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) UNSIGNED NOT NULL,
  `user_doc_id` varchar(13) DEFAULT NULL,
  `user_ran_id_i` int(11) DEFAULT NULL,
  `user_primer_nombre_v` varchar(60) DEFAULT NULL,
  `user_segundo_nombre_v` varchar(60) DEFAULT NULL,
  `user_primer_apellido_v` varchar(60) DEFAULT NULL,
  `user_segundo_apellido_v` varchar(60) DEFAULT NULL,
  `user_title_v` varchar(60) DEFAULT NULL,
  `user_cargo_v` varchar(60) DEFAULT NULL,
  `user_telephone_v` varchar(60) DEFAULT NULL,
  `user_correo_v` varchar(50) DEFAULT NULL,
  `user_psw_mail_v` text DEFAULT NULL,
  `user_password_v` varchar(255) DEFAULT NULL,
  `user_per_id_i` int(11) DEFAULT NULL,
  `user_image_v` varchar(255) DEFAULT 'views/usuarios/no_image.jpg',
  `user_est_id_i` int(1) DEFAULT NULL,
  `user_fecha_registro` timestamp NULL DEFAULT current_timestamp(),
  `user_ultimo_login_d` datetime DEFAULT NULL,
  `user_current_session_i` int(11) DEFAULT NULL,
  `user_online_i` int(11) DEFAULT NULL,
  `user_a_registro` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_doc_id`, `user_ran_id_i`, `user_primer_nombre_v`, `user_segundo_nombre_v`, `user_primer_apellido_v`, `user_segundo_apellido_v`, `user_title_v`, `user_cargo_v`, `user_telephone_v`, `user_correo_v`, `user_psw_mail_v`, `user_password_v`, `user_per_id_i`, `user_image_v`, `user_est_id_i`, `user_fecha_registro`, `user_ultimo_login_d`, `user_current_session_i`, `user_online_i`, `user_a_registro`) VALUES
(1, '1143231494', 3, 'Jose', 'David', 'Giron', 'Martinez', 'Técnico en Urgencias Médicas', 'Asistente de Bodega', '3114673616', 'jgiron9001@gmail.com', '123456', 'e10adc3949ba59abbe56e057f20f883e', 1, 'views/usuarios/707920220313152213.png', 1, '2022-03-11 14:37:03', '2022-03-13 15:26:11', 0, 1, 2022),
(2, '1143568963', 2, 'Juan ', 'De Dios', 'Gonzales', 'Martinez', 'Señor Bombero Supremo', 'Barrendero Supremo', '3114673616', 'encuestasjosegiron@gmail.com', '1143231494ABc_*', 'e10adc3949ba59abbe56e057f20f883e', 4, 'views/usuarios/709820220313152119.png', 1, '2022-03-13 19:52:59', '2022-03-13 15:26:04', NULL, 1, 2022);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uti_estados`
--

CREATE TABLE `uti_estados` (
  `est_id_i` int(11) NOT NULL,
  `es_descripcipcion_v` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `uti_estados`
--

INSERT INTO `uti_estados` (`est_id_i`, `es_descripcipcion_v`) VALUES
(1, 'ACTIVO'),
(2, 'INACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `uti_rangos`
--

CREATE TABLE `uti_rangos` (
  `ran_id_i` int(11) NOT NULL,
  `ran_descripcion_v` varchar(255) NOT NULL,
  `ran_sigla_v` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `uti_rangos`
--

INSERT INTO `uti_rangos` (`ran_id_i`, `ran_descripcion_v`, `ran_sigla_v`) VALUES
(1, 'Bombero', '(B).'),
(2, 'Cabo de Bombero', 'Cbo. (B).'),
(3, 'Sargento', 'Sgto. (B).');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calendar`
--
ALTER TABLE `calendar`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `calendar_exit`
--
ALTER TABLE `calendar_exit`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `comodato`
--
ALTER TABLE `comodato`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `informespreliminares`
--
ALTER TABLE `informespreliminares`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `informestrabajo`
--
ALTER TABLE `informestrabajo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inspectoria`
--
ALTER TABLE `inspectoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario_admin`
--
ALTER TABLE `inventario_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario_conta`
--
ALTER TABLE `inventario_conta`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario_jef`
--
ALTER TABLE `inventario_jef`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario_op`
--
ALTER TABLE `inventario_op`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario_secr`
--
ALTER TABLE `inventario_secr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `inventario_tes`
--
ALTER TABLE `inventario_tes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indices de la tabla `req_bienes`
--
ALTER TABLE `req_bienes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `req_ser`
--
ALTER TABLE `req_ser`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sys_menus`
--
ALTER TABLE `sys_menus`
  ADD PRIMARY KEY (`menus_id_i`);

--
-- Indices de la tabla `sys_perfiles`
--
ALTER TABLE `sys_perfiles`
  ADD PRIMARY KEY (`per_id_i`);

--
-- Indices de la tabla `sys_perfiles_menu`
--
ALTER TABLE `sys_perfiles_menu`
  ADD PRIMARY KEY (`pem_id_i`);

--
-- Indices de la tabla `sys_submenu`
--
ALTER TABLE `sys_submenu`
  ADD PRIMARY KEY (`submenu_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `users_FK` (`user_ran_id_i`),
  ADD KEY `users_FK_1` (`user_per_id_i`);

--
-- Indices de la tabla `uti_estados`
--
ALTER TABLE `uti_estados`
  ADD PRIMARY KEY (`est_id_i`);

--
-- Indices de la tabla `uti_rangos`
--
ALTER TABLE `uti_rangos`
  ADD PRIMARY KEY (`ran_id_i`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calendar`
--
ALTER TABLE `calendar`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `calendar_exit`
--
ALTER TABLE `calendar_exit`
  MODIFY `codigo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comodato`
--
ALTER TABLE `comodato`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informespreliminares`
--
ALTER TABLE `informespreliminares`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `informestrabajo`
--
ALTER TABLE `informestrabajo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inspectoria`
--
ALTER TABLE `inspectoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_admin`
--
ALTER TABLE `inventario_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_conta`
--
ALTER TABLE `inventario_conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_jef`
--
ALTER TABLE `inventario_jef`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_op`
--
ALTER TABLE `inventario_op`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_secr`
--
ALTER TABLE `inventario_secr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_tes`
--
ALTER TABLE `inventario_tes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `req_bienes`
--
ALTER TABLE `req_bienes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `req_ser`
--
ALTER TABLE `req_ser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sys_menus`
--
ALTER TABLE `sys_menus`
  MODIFY `menus_id_i` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `sys_perfiles`
--
ALTER TABLE `sys_perfiles`
  MODIFY `per_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sys_perfiles_menu`
--
ALTER TABLE `sys_perfiles_menu`
  MODIFY `pem_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `sys_submenu`
--
ALTER TABLE `sys_submenu`
  MODIFY `submenu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `uti_estados`
--
ALTER TABLE `uti_estados`
  MODIFY `est_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `uti_rangos`
--
ALTER TABLE `uti_rangos`
  MODIFY `ran_id_i` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_FK` FOREIGN KEY (`user_ran_id_i`) REFERENCES `uti_rangos` (`ran_id_i`),
  ADD CONSTRAINT `users_FK_1` FOREIGN KEY (`user_per_id_i`) REFERENCES `sys_perfiles` (`per_id_i`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
