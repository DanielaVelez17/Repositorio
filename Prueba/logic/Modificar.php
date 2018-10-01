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

	if ($result->num_rows <= 0) 	
	{
		echo'<script type="text/javascript">
        alert("No existe un jugador con esa cédula");
        document.location="../index.php";
        
        </script>';
	}
	else {



		while ($row = mysqli_fetch_row($result))
		{
			$cedula = $row[0];
			$nombre = $row[1];
			$primerApellido = $row[2];
			$segundoApellido = $row[3];
			$fecha = $row[4];
			$correo = $row[5];
			$celular = $row[6];
			$dinero = $row[7];

			     
		} 



	?>

	<a href="../views/EditarJugador.php/?cedula=<?php echo $cedula;?>&nombre=<?php echo $nombre;?>&primerApellido=<?php echo $primerApellido;?>&segundoApellido=<?php echo $segundoApellido;?>&fecha=<?php echo $fecha;?>&correo=<?php echo $correo;?>&celular=<?php echo $celular;?>&dinero=<?php echo $dinero;?>">Modificar Jugador</a>

	<?php 
	}
	 ?>