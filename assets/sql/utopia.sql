-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-09-2021 a las 17:32:47
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `utopia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administradores`
--

CREATE TABLE `administradores` (
  `adm_documento` varchar(15) NOT NULL,
  `adm_pass` varchar(15) NOT NULL,
  `adm_nombre` varchar(255) NOT NULL,
  `adm_rol` varchar(50) NOT NULL,
  `adm_telefono` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administradores`
--

INSERT INTO `administradores` (`adm_documento`, `adm_pass`, `adm_nombre`, `adm_rol`, `adm_telefono`) VALUES
('123', '123', 'administrador', 'ADMIN', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `busquedas`
--

CREATE TABLE `busquedas` (
  `bus_id` int(11) NOT NULL,
  `bus_fecha` varchar(255) NOT NULL,
  `bus_texto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cli_documento` varchar(255) NOT NULL,
  `cli_nombre` varchar(255) NOT NULL,
  `cli_apellidos` varchar(255) NOT NULL,
  `cli_telefono` varchar(50) NOT NULL,
  `cli_email` varchar(50) NOT NULL,
  `cli_departamento` varchar(255) NOT NULL,
  `cli_municipio` varchar(255) NOT NULL,
  `cli_direccion` varchar(255) NOT NULL,
  `cli_detalles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos`
--

CREATE TABLE `datos` (
  `dato_id` int(11) NOT NULL,
  `dato_nombre` varchar(255) NOT NULL,
  `dato_llave_p` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `datos`
--

INSERT INTO `datos` (`dato_id`, `dato_nombre`, `dato_llave_p`) VALUES
(1, 'llaveepaycopublic', '234123421342141234213421');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `img_id` int(11) NOT NULL,
  `img_nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `img_id` int(11) NOT NULL,
  `pro_ref` varchar(255) NOT NULL,
  `img_html` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listapedido`
--

CREATE TABLE `listapedido` (
  `lpe_id` int(11) NOT NULL,
  `ped_id` varchar(255) NOT NULL,
  `pro_ref` varchar(255) NOT NULL,
  `lpe_cantidad` int(11) NOT NULL,
  `lpe_precio` int(11) NOT NULL,
  `lpe_talla` varchar(16) NOT NULL,
  `lpe_tipo` int(11) NOT NULL,
  `lpe_nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ped_id` varchar(255) NOT NULL,
  `cli_documento` varchar(255) NOT NULL,
  `ped_datosEnvio` text NOT NULL,
  `ped_fecha_compra` varchar(255) NOT NULL,
  `ped_valor_productos` int(11) DEFAULT NULL,
  `ped_valor_flete` int(11) DEFAULT NULL,
  `ped_valor_total` int(11) DEFAULT NULL,
  `ped_forma_pago` varchar(255) NOT NULL,
  `ped_IDorden_epayco` int(11) DEFAULT NULL,
  `ped_estado_epayco` varchar(255) NOT NULL,
  `ped_estadoUtopia` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `pro_ref` varchar(255) NOT NULL,
  `tip_id` int(11) NOT NULL,
  `pro_nombre` varchar(255) NOT NULL,
  `pro_precio` int(11) NOT NULL,
  `pro_img` varchar(255) NOT NULL,
  `pro_descripcion` text NOT NULL,
  `pro_horma` varchar(16) DEFAULT NULL,
  `pro_contenido_neto` varchar(255) DEFAULT NULL,
  `pro_estado` varchar(16) NOT NULL,
  `pro_fechaCreacion` varchar(16) NOT NULL,
  `pro_prioridad` varchar(16) NOT NULL,
  `pro_activo` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tallas`
--

CREATE TABLE `tallas` (
  `talla_id` int(11) NOT NULL,
  `pro_ref` varchar(255) NOT NULL,
  `talla_numero` varchar(255) NOT NULL,
  `talla_cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_productos`
--

CREATE TABLE `tipo_productos` (
  `tip_id` int(11) NOT NULL,
  `tip_producto` varchar(255) NOT NULL,
  `tip_img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_productos`
--

INSERT INTO `tipo_productos` (`tip_id`, `tip_producto`, `tip_img`) VALUES
(1, 'jeans-mujer-clasico', 'jeans-mujer-clasico.jpg'),
(2, 'pijamas-mujer-pantalon', 'pijamas-mujer-pantalon.jpg'),
(3, 'pijamas-mujer-jogger', 'pijamas-mujer-jogger.jpg'),
(4, 'pijamas-mujer-blusones', 'pijamas-mujer-blusones.jpg'),
(5, 'pijamas-mujer-short', 'pijamas-mujer-short.jpg\r\n');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administradores`
--
ALTER TABLE `administradores`
  ADD PRIMARY KEY (`adm_documento`);

--
-- Indices de la tabla `busquedas`
--
ALTER TABLE `busquedas`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cli_documento`);

--
-- Indices de la tabla `datos`
--
ALTER TABLE `datos`
  ADD PRIMARY KEY (`dato_id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`img_id`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`img_id`),
  ADD KEY `pro_ref` (`pro_ref`);

--
-- Indices de la tabla `listapedido`
--
ALTER TABLE `listapedido`
  ADD PRIMARY KEY (`lpe_id`),
  ADD KEY `ped_id` (`ped_id`),
  ADD KEY `pro_ref` (`pro_ref`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ped_id`),
  ADD KEY `cli_documento` (`cli_documento`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`pro_ref`),
  ADD KEY `tip_id` (`tip_id`);

--
-- Indices de la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`talla_id`),
  ADD KEY `pro_ref` (`pro_ref`);

--
-- Indices de la tabla `tipo_productos`
--
ALTER TABLE `tipo_productos`
  ADD PRIMARY KEY (`tip_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `busquedas`
--
ALTER TABLE `busquedas`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `img_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `listapedido`
--
ALTER TABLE `listapedido`
  MODIFY `lpe_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tallas`
--
ALTER TABLE `tallas`
  MODIFY `talla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipo_productos`
--
ALTER TABLE `tipo_productos`
  MODIFY `tip_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `imagenes_ibfk_1` FOREIGN KEY (`pro_ref`) REFERENCES `productos` (`pro_ref`);

--
-- Filtros para la tabla `listapedido`
--
ALTER TABLE `listapedido`
  ADD CONSTRAINT `listapedido_ibfk_1` FOREIGN KEY (`ped_id`) REFERENCES `pedidos` (`ped_id`),
  ADD CONSTRAINT `listapedido_ibfk_2` FOREIGN KEY (`pro_ref`) REFERENCES `productos` (`pro_ref`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`cli_documento`) REFERENCES `clientes` (`cli_documento`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`tip_id`) REFERENCES `tipo_productos` (`tip_id`);

--
-- Filtros para la tabla `tallas`
--
ALTER TABLE `tallas`
  ADD CONSTRAINT `tallas_ibfk_1` FOREIGN KEY (`pro_ref`) REFERENCES `productos` (`pro_ref`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
