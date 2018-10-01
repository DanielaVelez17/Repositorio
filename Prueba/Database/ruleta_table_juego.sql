
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `juego`
--

DROP TABLE IF EXISTS `juego`;
CREATE TABLE IF NOT EXISTS `juego` (
  `idJuego` int(11) NOT NULL,
  `TotalJugadores` int(11) NOT NULL,
  PRIMARY KEY (`idJuego`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
