
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jugadores_juego`
--

DROP TABLE IF EXISTS `jugadores_juego`;
CREATE TABLE IF NOT EXISTS `jugadores_juego` (
  `idJugador` int(11) NOT NULL,
  `idJuego` int(11) NOT NULL,
  `numeroRonda` int(11) NOT NULL,
  KEY `fk_foreign_jugadoresJuego_jugadores` (`idJugador`),
  KEY `fk_foreign_jugadoresJuego_juego` (`idJuego`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
