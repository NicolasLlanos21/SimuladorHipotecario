-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2017 a las 16:44:25
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `simulador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(40) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `link` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `menu`, `id_tipo`, `link`) VALUES
(1, 'Simulador', 1, NULL),
(3, 'Cerrar Sesion', 1, 'logout.php'),
(6, 'Cerrar Sesion', 2, 'logout.php'),
(4, 'Simulador', 2, NULL),
(5, 'Configurar Parametros', 2, 'configurarparametros.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE `parametros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `valor` varchar(20) NOT NULL,
  `inicio_vigencia` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`id`, `nombre`, `valor`, `inicio_vigencia`) VALUES
(1, 'SMMLV', '737717', '2017-06-01'),
(2, 'MinSMMLVSubsidio', '70', '2017-06-04'),
(3, 'MaxSMMLVsubsidio', '135', '2017-05-01'),
(4, 'TasaInteresCredito', '10.8', '2017-05-01'),
(5, 'TasaSubsidio', '4', '2017-06-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros_historicos`
--

CREATE TABLE `parametros_historicos` (
  `id` int(11) NOT NULL,
  `id_parametro` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `fecha_inicio_vigencia` date NOT NULL,
  `fecha_final_vigencia` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `parametros_historicos`
--

INSERT INTO `parametros_historicos` (`id`, `id_parametro`, `valor`, `fecha_inicio_vigencia`, `fecha_final_vigencia`) VALUES
(2, 1, 900000, '2017-06-01', '2017-06-02'),
(3, 1, 737717, '2017-06-01', '2017-06-01'),
(4, 1, 800000, '2017-06-01', '2017-06-01'),
(5, 1, 737717, '2017-06-01', '2017-06-01'),
(6, 2, 70, '2017-06-04', '2017-05-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resultado_simulacion`
--

CREATE TABLE `resultado_simulacion` (
  `id` int(11) NOT NULL,
  `id_simulacion` int(11) NOT NULL,
  `numero_cuota` int(3) NOT NULL,
  `interes_cuota` int(15) NOT NULL,
  `abono_capital` int(15) NOT NULL,
  `subsidio` int(11) NOT NULL,
  `vlrcuotasinsub` int(11) NOT NULL,
  `vlrcoutaconsub` int(11) NOT NULL,
  `saldocapital` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `resultado_simulacion`
--

INSERT INTO `resultado_simulacion` (`id`, `id_simulacion`, `numero_cuota`, `interes_cuota`, `abono_capital`, `subsidio`, `vlrcuotasinsub`, `vlrcoutaconsub`, `saldocapital`) VALUES
(7502, 147, 1, 450000, 646141, 33333, 1096141, 1062808, 49353859),
(7503, 147, 2, 444184, 651956, 33333, 1096141, 1062808, 48701902),
(7504, 147, 3, 438317, 657823, 33333, 1096141, 1062808, 48044078),
(7505, 147, 4, 432396, 663744, 33333, 1096141, 1062808, 47380334),
(7506, 147, 5, 426423, 669717, 33333, 1096141, 1062808, 46710616),
(7507, 147, 6, 420395, 675745, 33333, 1096141, 1062808, 46034871),
(7508, 147, 7, 414313, 681827, 33333, 1096141, 1062808, 45353043),
(7509, 147, 8, 408177, 687963, 33333, 1096141, 1062808, 44665080),
(7510, 147, 9, 401985, 694155, 33333, 1096141, 1062808, 43970925),
(7511, 147, 10, 395738, 700402, 33333, 1096141, 1062808, 43270522),
(7512, 147, 11, 389434, 706706, 33333, 1096141, 1062808, 42563816),
(7513, 147, 12, 383074, 713066, 33333, 1096141, 1062808, 41850749),
(7514, 147, 13, 376656, 719484, 33333, 1096141, 1062808, 41131265),
(7515, 147, 14, 370181, 725959, 33333, 1096141, 1062808, 40405305),
(7516, 147, 15, 363647, 732493, 33333, 1096141, 1062808, 39672812),
(7517, 147, 16, 357055, 739085, 33333, 1096141, 1062808, 38933726),
(7518, 147, 17, 350403, 745737, 33333, 1096141, 1062808, 38187989),
(7519, 147, 18, 343691, 752449, 33333, 1096141, 1062808, 37435540),
(7520, 147, 19, 336919, 759221, 33333, 1096141, 1062808, 36676318),
(7521, 147, 20, 330086, 766054, 33333, 1096141, 1062808, 35910264),
(7522, 147, 21, 323192, 772948, 33333, 1096141, 1062808, 35137316),
(7523, 147, 22, 316235, 779905, 33333, 1096141, 1062808, 34357411),
(7524, 147, 23, 309216, 786924, 33333, 1096141, 1062808, 33570486),
(7525, 147, 24, 302134, 794006, 33333, 1096141, 1062808, 32776480),
(7526, 147, 25, 294988, 801152, 33333, 1096141, 1062808, 31975327),
(7527, 147, 26, 287777, 808363, 33333, 1096141, 1062808, 31166964),
(7528, 147, 27, 280502, 815638, 33333, 1096141, 1062808, 30351326),
(7529, 147, 28, 273161, 822979, 33333, 1096141, 1062808, 29528347),
(7530, 147, 29, 265755, 830385, 33333, 1096141, 1062808, 28697961),
(7531, 147, 30, 258281, 837859, 33333, 1096141, 1062808, 27860101),
(7532, 147, 31, 250740, 845400, 33333, 1096141, 1062808, 27014701),
(7533, 147, 32, 243132, 853008, 33333, 1096141, 1062808, 26161693),
(7534, 147, 33, 235455, 860685, 33333, 1096141, 1062808, 25301007),
(7535, 147, 34, 227709, 868431, 33333, 1096141, 1062808, 24432575),
(7536, 147, 35, 219893, 876247, 33333, 1096141, 1062808, 23556327),
(7537, 147, 36, 212006, 884134, 33333, 1096141, 1062808, 22672193),
(7538, 147, 37, 204049, 892091, 33333, 1096141, 1062808, 21780102),
(7539, 147, 38, 196020, 900120, 33333, 1096141, 1062808, 20879982),
(7540, 147, 39, 187919, 908221, 33333, 1096141, 1062808, 19971760),
(7541, 147, 40, 179745, 916395, 33333, 1096141, 1062808, 19055365),
(7542, 147, 41, 171498, 924642, 33333, 1096141, 1062808, 18130723),
(7543, 147, 42, 163176, 932964, 33333, 1096141, 1062808, 17197758),
(7544, 147, 43, 154779, 941361, 33333, 1096141, 1062808, 16256397),
(7545, 147, 44, 146307, 949833, 33333, 1096141, 1062808, 15306564),
(7546, 147, 45, 137759, 958381, 33333, 1096141, 1062808, 14348182),
(7547, 147, 46, 129133, 967007, 33333, 1096141, 1062808, 13381174),
(7548, 147, 47, 120430, 975710, 33333, 1096141, 1062808, 12405464),
(7549, 147, 48, 111649, 984491, 33333, 1096141, 1062808, 11420972),
(7550, 147, 49, 102788, 993352, 33333, 1096141, 1062808, 10427620),
(7551, 147, 50, 93848, 1002292, 33333, 1096141, 1062808, 9425327),
(7552, 147, 51, 84827, 1011313, 33333, 1096141, 1062808, 8414014),
(7553, 147, 52, 75726, 1020414, 33333, 1096141, 1062808, 7393599),
(7554, 147, 53, 66542, 1029598, 33333, 1096141, 1062808, 6364001),
(7555, 147, 54, 57276, 1038864, 33333, 1096141, 1062808, 5325136),
(7556, 147, 55, 47926, 1048214, 33333, 1096141, 1062808, 4276921),
(7557, 147, 56, 38492, 1057648, 33333, 1096141, 1062808, 3219272),
(7558, 147, 57, 28973, 1067167, 33333, 1096141, 1062808, 2152105),
(7559, 147, 58, 19368, 1076772, 33333, 1096141, 1062808, 1075333),
(7560, 147, 59, 9678, 1086463, 33333, 1096141, 1062808, 0),
(7561, 147, 60, 0, 1096141, 33333, 1096141, 1062808, 0),
(7562, 148, 1, 450000, 646141, 33333, 1096141, 1062808, 49353859),
(7563, 148, 2, 444184, 651956, 33333, 1096141, 1062808, 48701902),
(7564, 148, 3, 438317, 657823, 33333, 1096141, 1062808, 48044078),
(7565, 148, 4, 432396, 663744, 33333, 1096141, 1062808, 47380334),
(7566, 148, 5, 426423, 669717, 33333, 1096141, 1062808, 46710616),
(7567, 148, 6, 420395, 675745, 33333, 1096141, 1062808, 46034871),
(7568, 148, 7, 414313, 681827, 33333, 1096141, 1062808, 45353043),
(7569, 148, 8, 408177, 687963, 33333, 1096141, 1062808, 44665080),
(7570, 148, 9, 401985, 694155, 33333, 1096141, 1062808, 43970925),
(7571, 148, 10, 395738, 700402, 33333, 1096141, 1062808, 43270522),
(7572, 148, 11, 389434, 706706, 33333, 1096141, 1062808, 42563816),
(7573, 148, 12, 383074, 713066, 33333, 1096141, 1062808, 41850749),
(7574, 148, 13, 376656, 719484, 33333, 1096141, 1062808, 41131265),
(7575, 148, 14, 370181, 725959, 33333, 1096141, 1062808, 40405305),
(7576, 148, 15, 363647, 732493, 33333, 1096141, 1062808, 39672812),
(7577, 148, 16, 357055, 739085, 33333, 1096141, 1062808, 38933726),
(7578, 148, 17, 350403, 745737, 33333, 1096141, 1062808, 38187989),
(7579, 148, 18, 343691, 752449, 33333, 1096141, 1062808, 37435540),
(7580, 148, 19, 336919, 759221, 33333, 1096141, 1062808, 36676318),
(7581, 148, 20, 330086, 766054, 33333, 1096141, 1062808, 35910264),
(7582, 148, 21, 323192, 772948, 33333, 1096141, 1062808, 35137316),
(7583, 148, 22, 316235, 779905, 33333, 1096141, 1062808, 34357411),
(7584, 148, 23, 309216, 786924, 33333, 1096141, 1062808, 33570486),
(7585, 148, 24, 302134, 794006, 33333, 1096141, 1062808, 32776480),
(7586, 148, 25, 294988, 801152, 33333, 1096141, 1062808, 31975327),
(7587, 148, 26, 287777, 808363, 33333, 1096141, 1062808, 31166964),
(7588, 148, 27, 280502, 815638, 33333, 1096141, 1062808, 30351326),
(7589, 148, 28, 273161, 822979, 33333, 1096141, 1062808, 29528347),
(7590, 148, 29, 265755, 830385, 33333, 1096141, 1062808, 28697961),
(7591, 148, 30, 258281, 837859, 33333, 1096141, 1062808, 27860101),
(7592, 148, 31, 250740, 845400, 33333, 1096141, 1062808, 27014701),
(7593, 148, 32, 243132, 853008, 33333, 1096141, 1062808, 26161693),
(7594, 148, 33, 235455, 860685, 33333, 1096141, 1062808, 25301007),
(7595, 148, 34, 227709, 868431, 33333, 1096141, 1062808, 24432575),
(7596, 148, 35, 219893, 876247, 33333, 1096141, 1062808, 23556327),
(7597, 148, 36, 212006, 884134, 33333, 1096141, 1062808, 22672193),
(7598, 148, 37, 204049, 892091, 33333, 1096141, 1062808, 21780102),
(7599, 148, 38, 196020, 900120, 33333, 1096141, 1062808, 20879982),
(7600, 148, 39, 187919, 908221, 33333, 1096141, 1062808, 19971760),
(7601, 148, 40, 179745, 916395, 33333, 1096141, 1062808, 19055365),
(7602, 148, 41, 171498, 924642, 33333, 1096141, 1062808, 18130723),
(7603, 148, 42, 163176, 932964, 33333, 1096141, 1062808, 17197758),
(7604, 148, 43, 154779, 941361, 33333, 1096141, 1062808, 16256397),
(7605, 148, 44, 146307, 949833, 33333, 1096141, 1062808, 15306564),
(7606, 148, 45, 137759, 958381, 33333, 1096141, 1062808, 14348182),
(7607, 148, 46, 129133, 967007, 33333, 1096141, 1062808, 13381174),
(7608, 148, 47, 120430, 975710, 33333, 1096141, 1062808, 12405464),
(7609, 148, 48, 111649, 984491, 33333, 1096141, 1062808, 11420972),
(7610, 148, 49, 102788, 993352, 33333, 1096141, 1062808, 10427620),
(7611, 148, 50, 93848, 1002292, 33333, 1096141, 1062808, 9425327),
(7612, 148, 51, 84827, 1011313, 33333, 1096141, 1062808, 8414014),
(7613, 148, 52, 75726, 1020414, 33333, 1096141, 1062808, 7393599),
(7614, 148, 53, 66542, 1029598, 33333, 1096141, 1062808, 6364001),
(7615, 148, 54, 57276, 1038864, 33333, 1096141, 1062808, 5325136),
(7616, 148, 55, 47926, 1048214, 33333, 1096141, 1062808, 4276921),
(7617, 148, 56, 38492, 1057648, 33333, 1096141, 1062808, 3219272),
(7618, 148, 57, 28973, 1067167, 33333, 1096141, 1062808, 2152105),
(7619, 148, 58, 19368, 1076772, 33333, 1096141, 1062808, 1075333),
(7620, 148, 59, 9678, 1086463, 33333, 1096141, 1062808, 0),
(7621, 148, 60, 0, 1096141, 33333, 1096141, 1062808, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguro_vida`
--

CREATE TABLE `seguro_vida` (
  `edad` int(3) NOT NULL,
  `tasa` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `seguro_vida`
--

INSERT INTO `seguro_vida` (`edad`, `tasa`) VALUES
(18, 0.019),
(19, 0.019),
(20, 0.019),
(21, 0.019),
(22, 0.02),
(23, 0.02),
(24, 0.02),
(25, 0.02),
(26, 0.021),
(27, 0.021),
(28, 0.021),
(29, 0.022),
(30, 0.022),
(31, 0.022),
(32, 0.023),
(33, 0.024),
(34, 0.024),
(35, 0.025),
(36, 0.025),
(37, 0.026),
(38, 0.026),
(39, 0.027),
(40, 0.028),
(41, 0.029),
(42, 0.036),
(43, 0.037),
(44, 0.038),
(45, 0.04),
(46, 0.043),
(47, 0.046),
(48, 0.05),
(49, 0.055),
(50, 0.06),
(51, 0.065),
(52, 0.071),
(53, 0.076),
(54, 0.08),
(55, 0.084),
(56, 0.088),
(57, 0.09),
(58, 0.093),
(59, 0.096),
(60, 0.101),
(61, 0.112),
(62, 0.122),
(63, 0.135),
(64, 0.149),
(65, 0.166),
(66, 0.184),
(67, 0.203),
(68, 0.222),
(69, 0.241),
(70, 0.261),
(71, 0.283),
(72, 0.304),
(73, 0.332),
(74, 0.37),
(75, 0.414),
(76, 0.475),
(77, 0.518),
(78, 0.579),
(79, 0.671),
(80, 0.759),
(81, 0.857),
(82, 0.969),
(83, 1.075),
(84, 1.194),
(85, 1.194),
(86, 1.325),
(87, 1.325),
(88, 1.471),
(89, 1.471),
(90, 1.471);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `simulacion`
--

CREATE TABLE `simulacion` (
  `id` int(11) NOT NULL,
  `archivo` varchar(150) DEFAULT NULL,
  `Fecha` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `Valor_inmueble` int(10) NOT NULL,
  `Valor_credito` int(10) NOT NULL,
  `Plazo` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `simulacion`
--

INSERT INTO `simulacion` (`id`, `archivo`, `Fecha`, `id_usuario`, `Valor_inmueble`, `Valor_credito`, `Plazo`) VALUES
(147, 'usuario1_2017-06-07 18_38.pdf', '2017-06-07 00:00:00', 2, 95000000, 50000000, 60),
(148, 'usuario1_2017-06-07 19_00.pdf', '2017-06-07 00:00:00', 2, 95000000, 50000000, 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `submenu`
--

CREATE TABLE `submenu` (
  `id` int(11) NOT NULL,
  `submenu` varchar(40) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `link` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `submenu`
--

INSERT INTO `submenu` (`id`, `submenu`, `id_menu`, `id_tipo`, `link`) VALUES
(1, 'Generar Simulacion', 1, 1, 'simulador.php'),
(2, 'Consultar Simulacion', 1, 1, 'consultarsimulaciones.php'),
(3, 'Consultar Simulacion Usuario', 4, 2, 'consultarsimulaciones.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `descripcion` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo`, `tipo`, `descripcion`) VALUES
(1, 'usuario', 'usuario'),
(2, 'administrador', 'administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `Id_tipo` int(11) NOT NULL,
  `edad` int(3) NOT NULL,
  `ingreso_familiar` int(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `username`, `password`, `nombres`, `apellidos`, `address`, `telephone`, `Id_tipo`, `edad`, `ingreso_familiar`) VALUES
(1, 'administrador', 'admin2017', 'Don', 'Administrador', '1', '1', 2, 35, 1000000),
(2, 'usuario1', 'password1', 'Fabian', 'Vargas', 'Calle1 # 2-3', '5719999999', 1, 40, 1350000),
(3, 'usuario2', 'password2', 'Carlos', 'Arenas', 'Kra 1 # 2-3', '12345678', 1, 45, 2500000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parametros`
--
ALTER TABLE `parametros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `parametros_historicos`
--
ALTER TABLE `parametros_historicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `resultado_simulacion`
--
ALTER TABLE `resultado_simulacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `seguro_vida`
--
ALTER TABLE `seguro_vida`
  ADD PRIMARY KEY (`edad`);

--
-- Indices de la tabla `simulacion`
--
ALTER TABLE `simulacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `parametros_historicos`
--
ALTER TABLE `parametros_historicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `resultado_simulacion`
--
ALTER TABLE `resultado_simulacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7622;
--
-- AUTO_INCREMENT de la tabla `simulacion`
--
ALTER TABLE `simulacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;
--
-- AUTO_INCREMENT de la tabla `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
