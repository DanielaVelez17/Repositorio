 <?php 
 $idJuego = $_GET['idJuego'];
 ?>

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

  <!--<link rel="stylesheet" type="text/css" href="css/style.css">-->

  <!-- Incorporar el llamado a la app que controla el angular -->
  <script src="http://localhost/Prueba/static/js/appApi.js"></script>
</head>
<body>
  <div class="col-sm-6 col-md-offset-3">

        <form action="" method="post" role="form" id="formulario">
            <div id="form-group">
                <!--<label for="NumJugadores"> Jugadores en Juego: </label>-->
                <h1>Antes de la apuesta: </h1>

 <?php 
   include("../entities/jugador.php");  
   include("../entities/juego.php");  
   include("../entities/jugador_juego.php");  
   include("../entities/jugador_enjuego.php");  
   include("../db/conexion.php");  



//Jugadores
 $array_jugadores = array();

 
 $link = Conectarse();
 $result = sprintf("SELECT juego.idJuego, jugadores.cedula, jugadores.nombre, jugadores.cantidad_dinero,      jugadores_juego.numeroRonda FROM `jugadores`
                              JOIN `jugadores_juego` ON (jugadores_juego.idJugador=jugadores.cedula )
                              JOIN `juego` ON (juego.idJuego = jugadores_juego.idJuego)
                           
                              WHERE juego.idJuego = '%d'"

                              , mysqli_real_escape_string( $link, $idJuego ) );
  
  $result2 = mysqli_query( $link, $result );


//SE AGREGAN A LA LISTA LOS JUGADORES DE ESE JUEGO

  while ($row = mysqli_fetch_row($result2))
 {
    //Se crea un objeto de tipo Jugador en Juego
    $jugadorEnJuego = new JugadorJuego($row[0], $row[1], $row[2], $row[3], $row[4]); 
    array_push($array_jugadores, $jugadorEnJuego);

 }
 //Se crea la tabla
echo "<table>";
echo "<tr>";  
echo "<th>IdJuego</th>";  
echo "<th>Cedula</th>";  
echo "<th>Nombre</th>";                     
echo "<th>Dinero</th>"; 
echo "<th>Ronda</th>"; 
echo "</tr>";

$longitudArray = count($array_jugadores);

 for ($i=0; $i<$longitudArray; $i++)
 {
  $JugadorEscogido = $array_jugadores[$i];
 

  //Si es por primera vez, apuesta con 10000
  if(($JugadorEscogido->getNumeroRonda()) == 1)
  {
    $DineroApuesta = 10000;
    $DineroDisponible = ($JugadorEscogido->getDinero()) - $DineroApuesta;

    //Actualizar su dinero disponible en la bd
        
    $sqlDinero = sprintf("UPDATE `jugadores`
              SET 
                `cantidad_dinero` = '%d'
              WHERE 
                `cedula`= '%d'"

                  , mysqli_real_escape_string( $link, $DineroDisponible )
                  , mysqli_real_escape_string( $link, $JugadorEscogido->getIdJugador())  );

    mysqli_query( $link, $sqlDinero );

    //Probabilidades de los colores
    $AleatorioColor = rand(1, 100);

    if ($AleatorioColor <= 2)
    {
      $color = "Verde";
    }
    else if ($AleatorioColor >= 3 && $AleatorioColor <= 52)
    {
      $color = "Rojo";

    }
    else if ($AleatorioColor >= 53 && $AleatorioColor <= 100)
    {
      $color = "Negro";
    }
    

    //Generar un id random
    $idApuesta= rand(1, 100);

    $sql_consulta = sprintf("SELECT * FROM `apuesta` WHERE `idApuesta` = '%d')"
    , mysqli_real_escape_string( $link, $idApuesta ));

    mysqli_query( $link, $sql_consulta );

    $result = $link->query($sql_consulta);          

    
    $respuesta2 = 0;

    while ($respuesta2 = 0)
    {
      $idApuesta= rand(1, 100);
      $sql_consulta = sprintf("SELECT * FROM `apuesta` WHERE `idApuesta` = '%d')"
    , mysqli_real_escape_string( $link, $idApuesta ));

      mysqli_query( $link, $sql_consulta );
      $result = $link->query($sql_consulta);

      if ($result->num_rows > 0)
      {
        $respuesta2 = 0;
      }
      else 
      {
        $respuesta2 = 1;
      }
    }


    $sqlApuesta = sprintf("INSERT INTO `apuesta`(`idApuesta`, `idJuego`, `cedula`, `ronda`, `color`, `plataApuesta`) VALUES ('%d', '%d', '%d', '%d', '%s', '%d' )"                

                  , mysqli_real_escape_string( $link, $idApuesta )
                  , mysqli_real_escape_string( $link, $idJuego )
                  , mysqli_real_escape_string( $link, $JugadorEscogido->getIdJugador())
                  , mysqli_real_escape_string( $link, $JugadorEscogido->getNumeroRonda())
                  , mysqli_real_escape_string( $link, $color )
                  , mysqli_real_escape_string( $link, $DineroApuesta ));

    mysqli_query( $link, $sqlApuesta );





  }

  //Si no tiene dinero, no apuesta
  else if (($JugadorEscogido->getDinero()) == 0)  
  {
    $DineroApuesta = 0;
  }

  //Si tiene 1000 o menos, eso es lo que apuesta
  else if (($JugadorEscogido->getDinero()) <= 1000)  
  {
    $DineroApuesta = $JugadorEscogido->getDinero();
    $DineroDisponible = (($JugadorEscogido->getDinero()) - $DineroApuesta);

    
        
    $sqlDinero1 = sprintf("UPDATE `jugadores`
              SET 
                `cantidad_dinero` = '%d'
              WHERE 
                `cedula`= '%d'"

                  , mysqli_real_escape_string( $link, $DineroDisponible )
                  , mysqli_real_escape_string( $link, $JugadorEscogido->getIdJugador())  );

    mysqli_query( $link, $sqlDinero1 );

    //Probabilidades de los colores
    $AleatorioColor = rand(1, 100);

    if ($AleatorioColor <= 2)
    {
      $color = "Verde";
    }
    else if ($AleatorioColor >= 3 && $AleatorioColor <= 52)
    {
      $color = "Rojo";

    }
    else if ($AleatorioColor >= 53 && $AleatorioColor <= 100)
    {
      $color = "Negro";
    }

    //Generar un id random
    $idApuesta= rand(1, 100);

    $sql_consulta = sprintf("SELECT * FROM `apuesta` WHERE `idApuesta` = '%d')"
    , mysqli_real_escape_string( $link, $idApuesta ));

    mysqli_query( $link, $sql_consulta );

    $result = $link->query($sql_consulta);          

    
    $respuesta = 0;

    while ($respuesta = 0)
    {
      $idApuesta= rand(1, 100);
      $sql_consulta = sprintf("SELECT * FROM `apuesta` WHERE `idApuesta` = '%d')"
    , mysqli_real_escape_string( $link, $idApuesta ));

      mysqli_query( $link, $sql_consulta );
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


    $sqlApuesta = sprintf("INSERT INTO `apuesta`(`idApuesta`, `idJuego`, `cedula`, `ronda`, `color`, `plataApuesta`) VALUES ('%d', '%d', '%d', '%d', '%s', '%d' )"                

                  , mysqli_real_escape_string( $link, $idApuesta )
                  , mysqli_real_escape_string( $link, $idJuego )
                  , mysqli_real_escape_string( $link, $JugadorEscogido->getIdJugador())
                  , mysqli_real_escape_string( $link, $JugadorEscogido->getNumeroRonda())
                  , mysqli_real_escape_string( $link, $color )
                  , mysqli_real_escape_string( $link, $DineroApuesta )

                    );

    mysqli_query( $link, $sqlApuesta );


  }

  else
  {
    //Porcentaje de apuesta
    $numeroAleatorio = rand(0.8, 0.15);
    $DineroApuesta = $JugadorEscogido->getDinero() - ($JugadorEscogido->getDinero() * $numeroAleatorio);

    $DineroDisponible = ($JugadorEscogido->getDinero()) - $DineroApuesta;

    //Actualizar su dinero disponible en la bd
        
    $sqlDinero = sprintf("UPDATE `jugadores`
              SET 
                `cantidad_dinero` = '%d'
              WHERE 
                `cedula`= '%d'"

                  , mysqli_real_escape_string( $link, $DineroDisponible )
                  , mysqli_real_escape_string( $link, $JugadorEscogido->getIdJugador() )  );

    mysqli_query( $link, $sqlDinero );

        //Probabilidades de los colores
        
    $AleatorioColor = rand(1, 100);

    if ($AleatorioColor <= 2)
    {
      $color = "Verde";
    }
    else if ($AleatorioColor >= 3 && $AleatorioColor <= 52)
    {
      $color = "Rojo";

    }
    else if ($AleatorioColor >= 53 && $AleatorioColor <= 100)
    {
      $color = "Negro";
    }
    

    //Generar un id random
    $idApuesta= rand(1, 100);

    $sql_consulta = sprintf("SELECT * FROM `apuesta` WHERE `idApuesta` = '%d')"
    , mysqli_real_escape_string( $link, $idApuesta ));

    mysqli_query( $link, $sql_consulta );

    $result = $link->query($sql_consulta);          

    
    $respuesta = 0;

    while ($respuesta = 0)
    {
      $idApuesta= rand(1, 100);
      $sql_consulta = sprintf("SELECT * FROM `apuesta` WHERE `idApuesta` = '%d')"
    , mysqli_real_escape_string( $link, $idApuesta ));

      mysqli_query( $link, $sql_consulta );
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


    $sqlApuesta = sprintf("INSERT INTO `apuesta`(`idApuesta`, `idJuego`, `cedula`, `ronda`, `color`, `plataApuesta`) VALUES ('%d', '%d', '%d', '%d', '%s', '%d' )"                

                  , mysqli_real_escape_string( $link, $idApuesta )
                  , mysqli_real_escape_string( $link, $idJuego )
                  , mysqli_real_escape_string( $link, $JugadorEscogido->getIdJugador())
                  , mysqli_real_escape_string( $link, $JugadorEscogido->getNumeroRonda())
                  , mysqli_real_escape_string( $link, $color )
                  , mysqli_real_escape_string( $link, $DineroApuesta )

                    );

    mysqli_query( $link, $sqlApuesta );

  }

  
 }

//ResultadoFinal
$result2 = sprintf("SELECT juego.idJuego, jugadores.cedula, jugadores.nombre, jugadores.cantidad_dinero,      jugadores_juego.numeroRonda FROM `jugadores`
                              JOIN `jugadores_juego` ON (jugadores_juego.idJugador=jugadores.cedula )
                              JOIN `juego` ON (juego.idJuego = jugadores_juego.idJuego)
                           
                              WHERE juego.idJuego = '%d' GROUP BY (jugadores.cedula)"

                              , mysqli_real_escape_string( $link, $idJuego ) );
  
  $result3 = mysqli_query( $link, $result2 );
  while ($row = mysqli_fetch_row($result3)){ 
  echo "<tr>";  
        echo "<td>".$row[0]."</td>";  
        echo "<td>".$row[1]."</td>";  
        echo "<td>".$row[2]."</td>"; 
        echo "<td>".$row[3]."</td>"; 
        echo "<td>".$row[4]."</td>";  
         
        echo "</tr>";
  }

  


 echo "</table>"; 

?>

                
                 
            </div> 

            
              <br>
                
        </form>

        <h2>Apuestas</h2>




        <?php

        



       
       $link = Conectarse();


        

        $resultApuesta = sprintf("SELECT jugadores.nombre, apuesta.plataApuesta, apuesta.color FROM `apuesta` 
                              JOIN `juego` ON (juego.idJuego = apuesta.idJuego) 
                              JOIN `jugadores` ON 
                              (jugadores.cedula = apuesta.cedula) WHERE juego.idJuego = '%d'"

                              , mysqli_real_escape_string( $link, $idJuego ) );

        $resultadoQuery = mysqli_query( $link, $resultApuesta );

         

         //Se crea la tabla
          echo "<table>";
          echo "<tr>";  
          echo "<th>Nombre</th>";  
          echo "<th>Plata apostada</th>";  
          echo "<th>Color</th>";                     
          
          echo "</tr>";




        while ($row2 = mysqli_fetch_row($resultadoQuery))
        { 
        echo "<tr>";  
        echo "<td>".$row2[0]."</td>";  
        echo "<td>".$row2[1]."</td>";  
        echo "<td>".$row2[2]."</td>";               
        echo "</tr>";
        }
         echo "</table>"; 
        



        ?>
        <br>

        <h2>RESULTADO: </h2>
        <?php
        //Probabilidades de los resultados
        
          $AleatorioColor = rand(1, 100);

          if ($AleatorioColor <= 2)
          {
            $Resultado = "Verde";
          }
          else if ($AleatorioColor >= 3 && $AleatorioColor <= 52)
          {
            $Resultado = "Rojo";

          }
          else if ($AleatorioColor >= 53 && $AleatorioColor <= 100)
          {
            $Resultado = "Negro";
          }

        ?>
              

        <h1><?php echo $Resultado ?></h1>

        <?php

        $resultApuesta2 = sprintf("SELECT apuesta.cedula, apuesta.color, jugadores.cantidad_dinero, apuesta.plataApuesta FROM `apuesta` JOIN jugadores on (jugadores.cedula = apuesta.cedula) WHERE apuesta.idJuego = '%d'"

                              , mysqli_real_escape_string( $link, $idJuego ) );

        $resultadoQuery2 = mysqli_query( $link, $resultApuesta2 );

        while ($row2 = mysqli_fetch_row($resultadoQuery2))
        { 
          if ($row2[1]==$Resultado && $Resultado =="Rojo")
          {
            //Actualicele a ese jugador el saldo
            $NuevoSaldo = (($row2[3])*2) + ($row2[2]);

            $resultApuesta3 = sprintf("UPDATE jugadores
                                      SET cantidad_dinero = '%d'
                                        WHERE cedula = '%d'"

                              , mysqli_real_escape_string( $link, $NuevoSaldo )
                              , mysqli_real_escape_string( $link, $row2[0] ) );

            $resultadoQuery3 = mysqli_query( $link, $resultApuesta3 );


          }
          if ($row2[1]==$Resultado && $Resultado =="Negro")
          {
            //Actualicele a ese jugador el saldo
            $NuevoSaldo = (($row2[3])*2) + ($row2[2]);

            $resultApuesta3 = sprintf("UPDATE jugadores
                                      SET cantidad_dinero = '%d'
                                        WHERE cedula = '%d'"

                              , mysqli_real_escape_string( $link, $NuevoSaldo )
                              , mysqli_real_escape_string( $link, $row2[0] ) );

            $resultadoQuery3 = mysqli_query( $link, $resultApuesta3 );


          }
          else if ($row2[1]==$Resultado && $Resultado =="Verde")
          {
            //Actualicele a ese jugador el saldo
            $NuevoSaldo2 = (($row2[3])*15) + ($row2[2]);
            $resultApuesta4 = sprintf("UPDATE jugadores
                                      SET cantidad_dinero = '%d'
                                        WHERE cedula = '%d'"

                              , mysqli_real_escape_string( $link, $NuevoSaldo2 )
                              , mysqli_real_escape_string( $link, $row2[0] ) );

            $resultadoQuery4 = mysqli_query( $link, $resultApuesta4 );


          }
                      
        
        }

        ?>
        <br>

        <h2>Despues de las apuestas: </h2>
        
        <?php
        $resultt = sprintf("SELECT juego.idJuego, jugadores.cedula, jugadores.nombre, jugadores.cantidad_dinero,      jugadores_juego.numeroRonda FROM `jugadores`
                              JOIN `jugadores_juego` ON (jugadores_juego.idJugador=jugadores.cedula )
                              JOIN `juego` ON (juego.idJuego = jugadores_juego.idJuego)
                           
                              WHERE juego.idJuego = '%d' GROUP BY (jugadores.cedula)"

                              , mysqli_real_escape_string( $link, $idJuego ) );
  
        $resulttt = mysqli_query( $link, $resultt );

        echo "<table>";
        echo "<tr>";  
        echo "<th>IdJuego</th>";  
        echo "<th>Cedula</th>";  
        echo "<th>Nombre</th>";                     
        echo "<th>Dinero</th>"; 
        echo "<th>Ronda</th>"; 
        echo "</tr>";
        while ($row = mysqli_fetch_row($resulttt)){ 
        echo "<tr>";  
              echo "<td>".$row[0]."</td>";  
              echo "<td>".$row[1]."</td>";  
              echo "<td>".$row[2]."</td>"; 
              echo "<td>".$row[3]."</td>"; 
              echo "<td>".$row[4]."</td>";  
               
              echo "</tr>";
        }

  


 echo "</table>"; 

        ?>

        


    </div>

</body>
</html>