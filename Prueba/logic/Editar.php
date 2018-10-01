<?php 

$cc = $_POST['Cedula'];
$nombre = $_POST['Nombre'];
$primerApellido = $_POST['PrimerApellido'];
$segundoApellido = $_POST['SegundoApellido'];
$fecha = $_POST['FechaNacimiento'];
$correo = $_POST['Email'];
$celular = $_POST['Celular'];
$dinero = $_POST['Dinero'];

if ($dinero < 10000)
{
	
    echo'<script type="text/javascript">
        alert("La cantidad mínima de dinero es de 10.000");
        document.location.href="../index.php";
        </script>';

}
else
	{
	
	if (!isset($_SESSION)) {
	  session_start();
	}
	include("../db/conexion.php");  
	$link = Conectarse();  
		  	
	$sql = sprintf("UPDATE `jugadores`
	 					SET 
	 						`nombre`= '%s',
		 					`primerApellido`= '%s',
		 					`segundoApellido`= '%s',
		 					`fecha_nacimiento` = '%s',
		 					`email` = '%s',
		 					`celular` = '%d',
		 					`cantidad_dinero` = '%d'
	 					WHERE 
	 						`cedula`= '%d'"
	              
	              , mysqli_real_escape_string( $link, $nombre )
	              , mysqli_real_escape_string( $link, $primerApellido )
	              , mysqli_real_escape_string( $link, $segundoApellido )
	              , mysqli_real_escape_string( $link, $fecha )
	              , mysqli_real_escape_string( $link, $correo )
	              , mysqli_real_escape_string( $link, $celular )
	              , mysqli_real_escape_string( $link, $dinero )
	              , mysqli_real_escape_string( $link, $cc )  );

	mysqli_query( $link, $sql );
		  	 
	
	echo'<script type="text/javascript">
        alert("El jugador se ha modificado con éxito!");
        document.location="../index.php";
        
        </script>';	 
	
	}



?>