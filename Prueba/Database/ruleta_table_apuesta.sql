
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuesta`
--

DROP TABLE IF EXISTS `apuesta`;
CREATE TABLE IF NOT EXISTS `apuesta` (
  `idApuesta` int(11) NOT NULL,
  `idJuego` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `ronda` int(11) NOT NULL,
  `color` varchar(40) NOT NULL,
  `plataApuesta` int(11) NOT NULL,
  PRIMARY KEY (`idApuesta`),
  KEY `fk_apuesta_juego` (`idJuego`),
  KEY `fk_apuesta_jugadores` (`cedula`),
  KEY `fk_apuesta_jugadoresJuego` (`ronda`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
