<?php 

$cc = $_POST['Cedula'];

	
	if (!isset($_SESSION)) {
	  session_start();
	}
	include("../db/conexion.php");  
	$link = Conectarse();  
		  	
	$sqlConsulta = sprintf("SELECT * FROM `jugadores`  
	                            WHERE cedula ='%d'"
	              , mysqli_real_escape_string( $link, $cc ) );
	mysqli_query( $link, $sqlConsulta );

	$result = $link->query($sqlConsulta);

	if ($result->num_rows > 0) 	
	{
		$sql = sprintf("DELETE FROM `jugadores` 
	                            WHERE cedula ='%d'"
	              , mysqli_real_escape_string( $link, $cc ) );
		mysqli_query( $link, $sql );

		echo'<script type="text/javascript">
        alert("Se ha eliminado el jugador");
        document.location="../index.php";
        
        </script>';			
	}

	else 
	{
		echo'<script type="text/javascript">
        alert("No existe un jugador con esa cédula");
        document.location="../index.php";
        
        </script>';
	}
	



?>