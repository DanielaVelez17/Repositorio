<?php
class JugadorJuego {

   
   private $_idjuego;
   private $_idjugador;
   private $_nombre;
   private $_dinero;
   private $_numeroronda;



   public function JugadorJuego($idjuego,$idjugador,$nombre,$dinero,$numeroronda)
    {
      $this->_idjuego = $idjuego;
      $this->_idjugador = $idjugador;
      $this->_nombre = $nombre;
      $this->_dinero = $dinero;      
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

    public function getNombre()
    {
        return $this->_nombre;
    }

    public function getDinero()
    {
        return $this->_dinero;
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

    public function setNombre($nombre)
    {
        $this->_nombre = $nombre;
    }

    public function setDinero($dinero)
    {
        $this->_dinero = $dinero;
    }

    public function setNumeroRonda($numeroronda)
    {
        $this->_numeroronda = $numeroronda;
    }      

}
?>