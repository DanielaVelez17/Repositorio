<?php
class Jugador_Juego {

   private $_idjugador;
   private $_idjuego;
   private $_numeroronda;


   public function Jugador_Juego($idjugador,$idjuego,$numeroronda)
    {
      $this->_idjugador = $idjugador;
      $this->_idjuego = $idjuego;
      $this->_numeroronda = $numeroronda;
        
    }
 
    public function getIdJugador()
    {
        return $this->_idjugador;
    }

    public function getIdJuego()
    {
        return $this->_idjuego;
    }

 
    public function getNumeroRonda()
    {
        return $this->_numeroronda;
    }
    
    public function setIdJugador($idjugador)
    {
        $this->_idjugador = $idjugador;
    }

    public function setIdJuego($idjuego)
    {
        $this->_idjuego = $idjuego;
    }

    public function setNumeroRonda($numeroronda)
    {
        $this->_numeroronda = $numeroronda;
    }    

}
?>