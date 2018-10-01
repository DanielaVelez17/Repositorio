<?php
class Apuesta {

   private $_idapuesta;
   private $_idjuego;
   private $_cedula;
   private $_numeroronda;
   private $_color;
   private $_plataApuesta;


   public function Apuesta($idapuesta,$idjuego,$cedula,$numeroronda, $color, $plataApuesta)
    {
      $this->_idapuesta = $idapuesta;
      $this->_idjuego = $idjuego;
      $this->_cedula = $cedula;
      $this->_numeroronda = $numeroronda;
      $this->_color = $color;
      $this->_plataApuesta = $plataApuesta;
        
    }

    public function getIdApuesta()
    {
        return $this->_idapuesta;
    }
 
    public function getIdJuego()
    {
        return $this->_idjuego;
    }

    public function getCedula()
    {
        return $this->_cedula;
    }
    public function getNumeroRonda()
    {
        return $this->_numeroronda;
    }
    public function getColor()
    {
        return $this->_color;
    }
    public function getPlataApuesta()
    {
        return $this->_plataApuesta;
    }

    public function setIdApuesta($idapuesta)
    {
        $this->_idapuesta = $idapuesta;
    }
     
 
    public function setIdJuego($idjuego)
    {
        $this->_idjuego = $idjuego;
    }

    public function setCedula($cedula)
    {
        $this->_cedula = $cedula;
    }

    public function setNumeroRonda($numeroronda)
    {
        $this->_numeroronda = $numeroronda;
    }   

    public function setColor($color)
    {
        $this->_color = $color;
    }
    public function getPlataApuesta($plataApuesta)
    {
        $this->_plataApuesta = $plataApuesta;
    } 

}
?>