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
	<div class="col-sm-6 col-md-offset-3">

        <form action="" method="post" role="form" id="formulario">
            <div id="form-group">
                <label for="NumJugadores"> Número de Jugadores en esta partida: </label>

                <?php 
                 include("../entities/jugador.php");  
                 include("../db/conexion.php");  

                 //Jugadores
                 $array_jugadores = array();

                 
                 $link = Conectarse();
                 $result = mysqli_query($link, 'SELECT * FROM jugadores');
                 while ($row = mysqli_fetch_row($result))
                 {
                    //Se crea un objeto de tipo Jugador
                    $jugador = new Jugador($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6], $row[7]); 
                    array_push($array_jugadores, $jugador);

                 }
                 $longitud = count($array_jugadores);

                 $CantidadJugadoresPartida = rand(1, $longitud);
                ?>

                <label for="NumJug"> <?php echo $CantidadJugadoresPartida;?> </label>
                 
            </div> 
            <div id="form-group">
                <h2> Jugadores: </h2>
                <?php
                  //Se crea la tabla
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

                  //Garantizar que los jugadores no se repitan
                  $Posiciones = array();

                  //Agregar el juego a la bd
                  $link2 = Conectarse();

                  $fecha = getdate();

                  //Generar un id random
                  $idJuego= rand(1, 100);

                  $sql_consulta = sprintf("SELECT * FROM `juego` WHERE `idJuego` = '%d')"
                  , mysqli_real_escape_string( $link2, $idJuego ));

                  mysqli_query( $link2, $sql_consulta );

                  $result = $link->query($sql_consulta);                 

                  
                  $respuesta = 0;

                  while ($respuesta = 0)
                  {
                    $idJuego= rand(1, 100);
                    $sql_consulta = sprintf("SELECT * FROM `juego` WHERE `idJuego` = '%d')"
                  , mysqli_real_escape_string( $link2, $idJuego ));

                    mysqli_query( $link2, $sql_consulta );
                    $result = $link->query($sql_consulta);

                    if ($result->num_rows > 0)
                    {
                      $respuesta = 0;
                    }
                    else 
                    {
                      $respuesta = 1;
                    }
                  }




                  

                  $sql2 = sprintf("INSERT INTO `juego` (`idJuego`, `TotalJugadores`) VALUES ('%d', '%d')"
                  , mysqli_real_escape_string( $link2, $idJuego )
                  , mysqli_real_escape_string( $link2, $CantidadJugadoresPartida ));

                  mysqli_query( $link2, $sql2 );                  




                  for ($i = 1; $i <= $CantidadJugadoresPartida; $i++) {
                    $posicionAleatoria = rand(0, $longitud-1);
                    if (in_array($posicionAleatoria, $Posiciones))
                    {
                      $posicionAleatoria = rand(0, $longitud-1);
                      $i--;
                       
                    }
                    else{

                      array_push($Posiciones,$posicionAleatoria);

                      $JugadorEscogido = $array_jugadores[$posicionAleatoria];

                      echo "<tr>";  
                      echo "<td>".$JugadorEscogido->getCedula()."</td>";  
                      echo "<td>".$JugadorEscogido->getNombre()."</td>";  
                      echo "<td>".$JugadorEscogido->getPrimerApellido()."</td>"; 
                      echo "<td>".$JugadorEscogido->getSegundoApellido()."</td>"; 
                      echo "<td>".$JugadorEscogido->getFechaNacimiento()."</td>";
                      echo "<td>".$JugadorEscogido->getEmail()."</td>";  
                      echo "<td>".$JugadorEscogido->getCelular()."</td>";  
                      echo "<td>".$JugadorEscogido->getDinero()."</td>";  
                        
                      echo "</tr>"; 

                      $link4 = Conectarse();

                      //Insertar los jugadores a la bd
                      $numeroRonda= 1;

                      $sql4 = sprintf("INSERT INTO `jugadores_juego`(`idJugador`, `idJuego`, `numeroRonda`) VALUES ('%d', '%d', '%d')"
                      , mysqli_real_escape_string( $link, $JugadorEscogido->getCedula() )
                      , mysqli_real_escape_string( $link, $idJuego )
                      , mysqli_real_escape_string( $link, $numeroRonda ));

                      mysqli_query( $link4, $sql4 );


                      




                    }
                  }

                  echo "</table>"; 

                  
                ?>
                 
            </div> 

            
              <br>        

                <a href="../views/Apostar.php/?idJuego=<?php echo $idJuego;?>">Iniciar partida</a>        

                
        </form>

        


    </div>

</body>
</html>