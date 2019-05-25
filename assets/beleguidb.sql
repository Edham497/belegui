-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 07-04-2019 a las 01:44:31
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: 'beleguidb'
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'categorias'
--

create database beleguidb;
use beleguidb;

CREATE TABLE `categorias` (
  `idCategorias` int(11) NOT NULL,
  `categoria` varchar(45) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'favoritos'
--

CREATE TABLE `favoritos` (
  `idFavoritos` int(11) NOT NULL,
  `fecha_insertado` datetime DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='		';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'imagenes_productos'
--

CREATE TABLE `imagenes_productos` (
  `idImagenes` int(11) NOT NULL,
  `imagen` varchar(245) DEFAULT NULL,
  `idProducto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'imagenes_publicaciones'
--

CREATE TABLE `imagenes_publicaciones` (
  `idImagenesPublicaciones` int(11) NOT NULL,
  `imagen` varchar(245) DEFAULT NULL,
  `idPublicacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'likes'
--

CREATE TABLE `likes` (
  `idLikes` int(11) NOT NULL,
  `fecha_like` datetime DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idPublicacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'pedidos'
--

CREATE TABLE `pedidos` (
  `idPedidos` int(11) NOT NULL,
  `estado` char(3) DEFAULT NULL,
  `fecha_pedido` datetime DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'personalizados'
--

CREATE TABLE `personalizados` (
  `idPersonalizados` int(11) NOT NULL,
  `talla_hombros` decimal(10,0) DEFAULT NULL,
  `talla_cuello` decimal(10,0) DEFAULT NULL,
  `largo_talle_t` decimal(10,0) DEFAULT NULL,
  `largo_talle_d` decimal(10,0) DEFAULT NULL,
  `separacion_busto` decimal(10,0) DEFAULT NULL,
  `sis` decimal(10,0) DEFAULT NULL,
  `largo_manga` decimal(10,0) DEFAULT NULL,
  `talla_cadera` decimal(10,0) DEFAULT NULL,
  `notas` varchar(245) DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idVestido` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'productos'
--

CREATE TABLE `productos` (
  `idProductos` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `color` varchar(45) DEFAULT NULL,
  `fecha_insertado` varchar(45) NOT NULL,
  `idCategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'productos_pedidos'
--

CREATE TABLE `productos_pedidos` (
  `idProductosPedidos` int(11) NOT NULL,
  `idPedidos` int(11) NOT NULL,
  `idProductos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'publicaciones'
--

CREATE TABLE `publicaciones` (
  `idPublicaciones` int(11) NOT NULL,
  `publicacion` varchar(245) DEFAULT NULL,
  `fecha_publicacion` datetime DEFAULT NULL,
  `idUsuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'roles'
--

CREATE TABLE `roles` (
  `idRoles` int(11) NOT NULL,
  `rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'tallas'
--

CREATE TABLE `tallas` (
  `idTallas` int(11) NOT NULL,
  `talla` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'tipos'
--

CREATE TABLE `tipos` (
  `idTipos` int(11) NOT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'usuarios'
--

CREATE TABLE `usuarios` (
  `idUsuarios` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido_paterno` varchar(255) NOT NULL,
  `apellido_materno` varchar(45) NOT NULL,
  `nickname` varchar(45) unique,
  `fecha_nac` datetime DEFAULT NULL,      	
  `genero` char(1) DEFAULT NULL,
  `telefono` char(10) DEFAULT NULL UNIQUE,
  `email` varchar(45) NOT NULL UNIQUE,
  `pass` varchar(45) NOT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `fecha_insertado` datetime NOT NULL,
  `codigoAleatorio` varchar(13),
  `estado` int default 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'usuarios_roles'
--

CREATE TABLE `usuarios_roles` (
  `idUsuariosRoles` int(11) NOT NULL,
  `idUsuario` int(11) DEFAULT NULL,
  `idRol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='	';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla 'vestidos'
--

CREATE TABLE `vestidos` (
  `idVestidos` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `idTalla` int(11) NOT NULL,
  `idTipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla 'categorias'
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCategorias`);

--
-- Indices de la tabla 'favoritos'
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`idFavoritos`);

--
-- Indices de la tabla 'imagenes_productos'
--
ALTER TABLE `imagenes_productos`
  ADD PRIMARY KEY (`idImagenes`);

--
-- Indices de la tabla 'imagenes_publicaciones'
--
ALTER TABLE `imagenes_publicaciones`
  ADD PRIMARY KEY (`idImagenesPublicaciones`);

--
-- Indices de la tabla 'likes'
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`idLikes`);

--
-- Indices de la tabla 'pedidos'
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedidos`);

--
-- Indices de la tabla 'personalizados'
--
ALTER TABLE `personalizados`
  ADD PRIMARY KEY (`idPersonalizados`);

--
-- Indices de la tabla 'productos'
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProductos`);

--
-- Indices de la tabla 'productos_pedidos'
--
ALTER TABLE `productos_pedidos`
  ADD PRIMARY KEY (`idProductosPedidos`);

--
-- Indices de la tabla 'publicaciones'
--
ALTER TABLE `publicaciones`
  ADD PRIMARY KEY (`idPublicaciones`);

--
-- Indices de la tabla 'roles'
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`idRoles`);

--
-- Indices de la tabla 'tallas'
--
ALTER TABLE `tallas`
  ADD PRIMARY KEY (`idTallas`);

--
-- Indices de la tabla 'tipos'
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`idTipos`);

--
-- Indices de la tabla 'usuarios'
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuarios`);

--
-- Indices de la tabla 'usuarios_roles'
--
ALTER TABLE `usuarios_roles`
  ADD PRIMARY KEY (`idUsuariosRoles`);

--
-- Indices de la tabla 'vestidos'
--
ALTER TABLE `vestidos`
  ADD PRIMARY KEY (`idVestidos`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla 'usuarios'
--
ALTER TABLE `usuarios`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;