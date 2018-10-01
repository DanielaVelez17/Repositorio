<?php
class Juego {

   private $_idjuego;
   private $_totaljugadores;


   public function Juego($idjuego,$totaljugadores)
    {
      $this->_idjuego = $idjuego;
      $this->_totaljugadores = $totaljugadores;
        
    }
 
    public function getIdJuego()
    {
        return $this->_idjuego;
    }

 
    public function getTotalJugadores()
    {
        return $this->_totaljugadores;
    }
    
 
    public function setIdJuego($idjuego)
    {
        $this->_idjuego = $idjuego;
    }

    public function setTotalJugadores($totaljugadores)
    {
        $this->_totaljugadores = $totaljugadores;
    }    

}
?>