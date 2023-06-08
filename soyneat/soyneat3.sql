-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2023 a las 11:17:40
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soyneat3`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carta`
--

CREATE TABLE `carta` (
  `idCarta` int(10) NOT NULL,
  `producto` varchar(30) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `descripcion_sub` varchar(500) DEFAULT NULL,
  `precio` float NOT NULL,
  `pathImagen` varchar(200) NOT NULL,
  `type` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `carta`
--

INSERT INTO `carta` (`idCarta`, `producto`, `descripcion`, `descripcion_sub`, `precio`, `pathImagen`, `type`) VALUES
(1, 'SOYNEAT ORIGINAL', '¡La mezcla perfecta de innovación y el \r\nsabor auténtico que más te gusta! \r\nSu carne impresa con tecnología 3D apuesta por un futuro más sostenible sin prescindir de los productos más frescos y nutritivos. <br><br>\r\n\r\nPan brioche, carne soyneat, tomate, cebolla  lechuga, queso vegano y salsa cheddar vegana.', NULL, 8.5, 'b_soyneat.png', 1),
(2, 'SOYSEITÁN', 'Jugosa y ahumada, cocinada a la brasa con los ingredientes más silvestres y frescos. \r\n<br><br>\r\nPan rústico, carne de seitán, setas, rúcula, frutos del bosque y salsa veganesa.', NULL, 8.7, 'b_soyseitan.png', 1),
(3, 'SOYSPICY', '¡La favorita de los adictos al picante!<br>\r\nNuestra opción favorita sin gluten, acompañada de nuestra salsa picante casera te dejará con ganas de más. \r\n<br><br>\r\nPan de maicena (sin gluten), carne vegetal soyprint, queso vegano, cebolla jalapeños y salsa de chile picante.', NULL, 9, 'b_soyspicy.png', 1),
(4, 'SOYTOFU', 'Si buscas frescor y ligereza en cada bocado, ¡esta es tu hamburguesa! El dulzor de la pera y el potente sabor de la salsa de cacahuete no te dejarán indiferente.\r\n<br><br>\r\nPan de semillas, carne vegetal de tofu ahumado, zanahoria, pepino, trozos de pera y salsa de crema de cacahuete y soja.', NULL, 8.5, 'b_soytofu.png', 1),
(5, 'SOYMEDITERRÁNEA', 'El sabor de la casa en una hamburguesa, cocinada con ingredientes locales, de temporada y de calidad.\r\n<br><br>\r\nPan rústico, carne de seitán, tomate valenciano, lechuga, cebolla, pepino y salsa alioli.', NULL, 8.75, 'b_mediterranea.png', 1),
(6, 'SOYCRISPY', '¡El crujiente de nuestra carne vegetal empanizada con copos de maíz es más que adictivo!\n<br><br>\nPan brioche, carne vegetal \"soypollo\", lechuga, tomate, queso vegano, cebolla caramelizada y salsa mayonesa', NULL, 8.5, 'b_soycrispy.png', 1),
(8, 'TOTOPOS & GUAC', 'El guacamole más fresco hecho con aguacate, tomate, cebolla, cilantro y jugo de lima acompañado con tortillas de maíz saladas y crujientes.', NULL, 4.5, 'ac_guac.png', 2),
(9, 'SOYNUGGETS', '8 piezas de carne vegetal \"soypollo\" acompañados de salsa BBQ. ', NULL, 4, 'ac_nuggets.png', 2),
(10, 'PATATAS BRAVAS', 'Una ración de patatas bravas servidas con alioli.', NULL, 4, 'ac_bravas.png', 2),
(11, 'PATATAS RÚSTICAS', 'Patas al horno con hierbas servidas con salsa BBQ y veganesa.', NULL, 4.8, 'ac_rusticas.png', 2),
(12, 'TEMPURA CON SALSA AGRIDULCE', 'Variado de verduras rebozadas con panko, fritas en aceite de olvida y acompañadas de salsa agridulce.', NULL, 5.3, 'ac_tempura.png', 2),
(13, 'PALITOS DE QUESO', 'Tiras de queso tierno, rebozadas y fritas con aceite de oliva, servidas con mermelada de frutos del bosque.', NULL, 4, 'ac_palitos.png', 2),
(14, 'SALSA BBQ', '', NULL, 1.5, 's_bbq.png', 3),
(15, 'SALSA SOUR CREAM', '', NULL, 1.5, 's_sourcream.png', 3),
(16, 'SALSA AGRIDULCE', '', NULL, 1.5, 's_agridulce.png', 3),
(17, 'SALSA DE SOJA Y CACAHUETE', '', NULL, 1.5, 's_cacahuete.png', 3),
(18, 'KETCHUP', '', NULL, 1.5, 's_ketchup.png', 3),
(19, 'AGUA NATURAL', '', NULL, 1.5, 'bebida_agua.png', 4),
(20, 'AGUA CON GAS', '', NULL, 1.5, 'bebida_aguagas.png', 4),
(21, 'CERVEZA  CORONA', '', NULL, 2.5, 'bebida_cerveza.png', 4),
(22, 'ZUMO DE PIÑA', '', NULL, 2, 'bebida_pinya.png', 4),
(23, 'ZUMO DE NECTARINA', '', NULL, 1.5, 'bebida_nectarina.png', 4),
(24, 'LECHE DE ALMENDRA', '', NULL, 1.6, 'bebida_leche.png', 4),
(25, 'BROWNIE', '', NULL, 4.5, 'p_brownie.png', 5),
(26, 'CHEESECAKE', '', NULL, 5, 'p_cheesecake.png', 5),
(27, 'TARTA TATÍN', '', NULL, 4, 'p_tatin.png', 5),
(28, 'TARTA LIMA-LIMÓN', '', NULL, 4.7, 'p_tartalima.png', 5),
(29, 'TARTA DE SANTIAGO', '', NULL, 6, 'p_tartasantiago.png', 5),
(30, 'HELADO DE MANGO', '', NULL, 4, 'p_heladomango.png', 5),
(31, 'Menú primero', 'COMBO SOYNEAT <br>+ soynuggets', NULL, 10, 'combo_soyneat.png', 6),
(32, 'Menú segundo', 'COMBO SOYSEITÁN <br>+ patatas ', NULL, 11, 'combo_soyseitan.png', 6),
(33, 'Menú tercero', 'COMBO SOYMEDITERRÁNEA <br>+ pa', NULL, 12, 'combo_soymediterranea.png', 6),
(34, 'Menú cuarto', 'COMBO SOYSPICY <br>+ totopos & guac', NULL, 9, 'combo_soyspicy.png', 6),
(35, 'Menú quinto', 'COMBO SOYCRISPY <br>+ palitos de queso', NULL, 9.5, 'combo_soycrispy.png', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingrediente`
--

CREATE TABLE `ingrediente` (
  `idIngrediente` int(10) NOT NULL,
  `codigo` int(5) NOT NULL,
  `Descripcion` varchar(1000) NOT NULL,
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ingrediente`
--

INSERT INTO `ingrediente` (`idIngrediente`, `codigo`, `Descripcion`, `precio`) VALUES
(1, 101, 'Pan brioche', 0),
(2, 102, 'Pan de centeno', 0),
(3, 201, 'Carne soyneat', 0),
(4, 202, 'Carne de seitán', 0),
(5, 301, 'Queso vegano', 1),
(6, 302, 'Bacon vegano', 1),
(7, 303, 'Berenjena a la plancha', 1),
(8, 103, 'Pan de maicena (sin gluten)', 0),
(9, 104, 'Pan con semillas', 0),
(10, 203, 'Carne soypollo', 0),
(11, 204, 'Carne de tofu', 0),
(12, 304, 'Pimientos de padrón', 0),
(13, 405, 'Lechuga', 0),
(14, 406, 'Tomate', 0),
(15, 407, 'Canónigos', 0),
(16, 408, 'Pepinillos', 0),
(17, 409, 'Cebolla', 0),
(18, 501, 'Salsa BBQ', 0),
(19, 502, 'Ketchup', 0),
(20, 503, 'Veganesa', 0),
(21, 504, 'Salsa de chile picante', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itempedido`
--

CREATE TABLE `itempedido` (
  `idItemPedido` int(10) NOT NULL,
  `idPedido` int(10) NOT NULL,
  `idCarta` int(10) DEFAULT NULL,
  `precio` float NOT NULL,
  `comentario` varchar(250) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Si el item es algo de la carta, el campo idCarta no será NULL. Si el item del pedido es un item personalizado entonces SI que tendrá el valor NULL y hay que consultar la tabla de itempersonalizada para que obtener todos los items que componen el item personalizado';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `itempersonalizada`
--

CREATE TABLE `itempersonalizada` (
  `idItemPersonalizada` int(10) NOT NULL,
  `idItemPedido` int(10) NOT NULL,
  `idIngrediente` int(10) NOT NULL,
  `precio` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` int(10) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `login` varchar(100) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nombre` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `pago` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `login`, `password`, `nombre`, `email`, `pago`) VALUES
(3, 'jpiris', 'hola2', 'Piris', 'pvimavjonpi', 'Tarjeta');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carta`
--
ALTER TABLE `carta`
  ADD PRIMARY KEY (`idCarta`);

--
-- Indices de la tabla `ingrediente`
--
ALTER TABLE `ingrediente`
  ADD PRIMARY KEY (`idIngrediente`);

--
-- Indices de la tabla `itempedido`
--
ALTER TABLE `itempedido`
  ADD PRIMARY KEY (`idItemPedido`),
  ADD KEY `idCarta` (`idCarta`),
  ADD KEY `idPedido` (`idPedido`);

--
-- Indices de la tabla `itempersonalizada`
--
ALTER TABLE `itempersonalizada`
  ADD PRIMARY KEY (`idItemPersonalizada`),
  ADD KEY `idItemPedido` (`idItemPedido`),
  ADD KEY `idIngrediente` (`idIngrediente`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `itempedido`
--
ALTER TABLE `itempedido`
  MODIFY `idItemPedido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT de la tabla `itempersonalizada`
--
ALTER TABLE `itempersonalizada`
  MODIFY `idItemPersonalizada` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
  MODIFY `idPedido` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `itempedido`
--
ALTER TABLE `itempedido`
  ADD CONSTRAINT `itempedido_ibfk_2` FOREIGN KEY (`idCarta`) REFERENCES `carta` (`idCarta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itempedido_ibfk_3` FOREIGN KEY (`idPedido`) REFERENCES `pedido` (`idPedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `itempersonalizada`
--
ALTER TABLE `itempersonalizada`
  ADD CONSTRAINT `itempersonalizada_ibfk_1` FOREIGN KEY (`idItemPedido`) REFERENCES `itempedido` (`idItemPedido`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `itempersonalizada_ibfk_2` FOREIGN KEY (`idIngrediente`) REFERENCES `ingrediente` (`idIngrediente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
