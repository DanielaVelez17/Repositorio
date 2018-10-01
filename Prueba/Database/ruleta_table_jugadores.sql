
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores`
--

DROP TABLE IF EXISTS `jugadores`;
CREATE TABLE IF NOT EXISTS `jugadores` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `primerApellido` varchar(50) NOT NULL,
  `segundoApellido` varchar(50) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `celular` bigint(11) NOT NULL,
  `cantidad_dinero` int(11) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`cedula`, `nombre`, `primerApellido`, `segundoApellido`, `fecha_nacimiento`, `email`, `celular`, `cantidad_dinero`) VALUES
(1923656789, 'Carlos', 'Munoz', 'Bolanos', '1994-02-17', 'carlos@gmail.com', 3224567643, 7820000),
(2147483647, 'Pedro ', 'Perez', 'Lopez', '1789-09-28', 'pedro@perez.com', 7765678, 29760000),
(98765, 'DaniaN', 'LopezN', 'ZapataN', '2018-09-30', 'dania@kika.com', 2147465417, 3800000),
(146785, 'Laura', 'Vargas', 'Villa', '2018-08-27', 'laura@m.com', 98789, 480000),
(890097, 'Livia', 'Caceres', 'Caceres', '2018-09-14', 'livia@c.com', 9878979, 79750000);
