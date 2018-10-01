<?php
class Jugador {

   private $_cedula;
   private $_nombre;
   private $_primer_apellido;
   private $_segundo_apellido;
   private $_fecha_nacimiento;
   private $_email;
   private $_celular;
   private $_dinero;


   public function Jugador($cedula,$nombre,
   $primer_apellido,$segundo_apellido,$fecha_nacimiento,$email,$celular,$dinero)
    {
      $this->_cedula = $cedula;
      $this->_nombre = $nombre;
      $this->_primer_apellido = $primer_apellido;
      $this->_segundo_apellido = $segundo_apellido;
      $this->_fecha_nacimiento = $fecha_nacimiento;
      $this->_email = $email;
      $this->_celular = $celular;
      $this->_dinero = $dinero;
        
    }
 
    public function getCedula()
    {
        return $this->_cedula;
    }

 
    public function getNombre()
    {
        return $this->_nombre;
    }

    public function getPrimerApellido()
    {
        return $this->_primer_apellido;
    }

    public function getSegundoApellido()
    {
        return $this->_segundo_apellido;
    }

    public function getFechaNacimiento()
    {
        return $this->_fecha_nacimiento;
    }

    public function getEmail()
    {
        return $this->_email;
    }

    public function getCelular()
    {
        return $this->_celular;
    }

    public function getDinero()
    {
        return $this->_dinero;
    }
 
    public function setCedula($cedula)
    {
        $this->_cedula = $cedula;
    }

    public function setNombre($nombre)
    {
        $this->_nombre = $nombre;
    }

    public function setPrimerApellido($primer_apellido)
    {
        $this->_primer_apellido = $primer_apellido;
    }

    public function setSegundoApellido($segundo_apellido)
    {
        $this->_segundo_apellido = $segundo_apellido;
    }

    public function setFechaNacimiento($fecha_nacimiento)
    {
        $this->_fecha_nacimiento = $fecha_nacimiento;
    }    

    public function setEmail($email)
    {
        $this->_email = $email;
    }

    public function setCelular($celular)
    {
        $this->_celular = $celular;
    }

    public function setDinero($dinero)
    {
        $this->_dinero = $dinero;
    }

    

}
?>