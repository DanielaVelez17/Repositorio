<!DOCTYPE html>
<html lang="en">
<head>
	<title>Ruleta</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Configuración Bootstrap-->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

  	<!--Angular-->
  	<script src="//cdnjs.cloudflare.com/ajax/libs/angular.js/1.4.2/angular.js"></script>

	<!--NgTable-->
	<link rel="stylesheet"; href="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.css">
	<script src="https://unpkg.com/ng-table@2.0.2/bundles/ng-table.min.js"></script>

	
	<!-- Incorporar el llamado a la app que controla el angular -->
	<script src="http://localhost/Prueba/static/js/appApi.js"></script>

</head>
<body>
	<div class="container-fluid" ng-controller="ruletaController">
	  <h1>Bienvenido al juego de la Ruleta</h1>
	  
	  <!--Crear un nuevo jugador-->
	  <button type="button" class="btn btn-primary" onclick = "location='views/NuevoJugador.php'">Agregar jugador</button>

	  <button type="button" class="btn btn-primary" onclick = "location='views/ModificarJugador.php'">Modificar jugador</button>

	  <button type="button" class="btn btn-primary" onclick = "location='views/EliminarJugador.php'">Eliminar jugador</button>
	  
	  <div>
	  	<br>

	  <h2> Jugadores: </h2>
	  <?php 
	  include("db/conexion.php");  
	  $link = Conectarse();  
	  //se envia la consulta  	
	  	 
		$result = mysqli_query($link, 'SELECT * FROM jugadores');
		echo "<table>";
		echo "<tr>";  
		echo "<th>Cedula</th>";  
		echo "<th>Nombre</th>";  
		echo "<th>Primer Apellido</th>";  
		echo "<th>Segundo Apellido</th>"; 
		echo "<th>Fecha de Nacimiento</th>"; 
		echo "<th>Correo Electronico</th>";  
		echo "<th>Celular</th>"; 
		echo "<th>Dinero</th>"; 
		echo "</tr>";  


		
		while ($row = mysqli_fetch_row($result)){ 
		    echo "<tr>";  
		    echo "<td>".$row[0]."</td>";  
		    echo "<td>".$row[1]."</td>";  
		    echo "<td>".$row[2]."</td>"; 
		    echo "<td>".$row[3]."</td>"; 
		    echo "<td>".$row[4]."</td>";  
		    echo "<td>".$row[5]."</td>";  
		    echo "<td>".$row[6]."</td>";  
		    echo "<td>".$row[7]."</td>";  
		    echo "</tr>";  
		} 
		echo "</table>"; 
	?> 




	  
	  </div>
	  <br>

	  <button type="button" class="btn btn-danger" onclick = "location='views/Jugar.php'">JUGAR</button>
	</div>

</body>
</html>