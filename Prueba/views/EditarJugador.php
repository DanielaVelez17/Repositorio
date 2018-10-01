<?php
$v1 = $_GET['cedula'];
$v2 = $_GET['nombre']; 
$v3 = $_GET['primerApellido']; 
$v4 = $_GET['segundoApellido']; 
$v5 = $_GET['fecha'];
$v6 = $_GET['correo'];
$v7 = $_GET['celular'];
$v8 = $_GET['dinero'];
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

	

	<!-- Incorporar el llamado a la app que controla el angular -->
	<script src="http://localhost/Prueba/static/js/appApi.js"></script>
</head>
<body>
	<div class="col-sm-6 col-md-offset-3">

        <form action="../../logic/Editar.php" method="post" role="form" id="formulario">
            
            <div id="form-group">
                <label for="Cedula"> Cédula: </label>                
                    <input type="number" class="form-control" value=<?php echo $v1;?> name="Cedula" id="cedula" placeholder="Introduce tu cédula" required="required" readonly>               
            </div>
            
            <div id="form-group">
                <br>
                <label for="Nombre"> Nombre: </label>
                <input type="text" class="form-control" name="Nombre" value=<?php echo $v2;?> id="nombre" placeholder="Introduce tu nombre" required="required"> 
            </div>
            <div id="form-group">
                <br>
                <label for="PrimerApellido"> Primer Apellido: </label>
                <input type="text" class="form-control" name="PrimerApellido" value=<?php echo $v3;?> id="primerapellido" placeholder="Introduce tu primer apellido" required="required"> 
            </div>
            <div id="form-group">
                <br>
                <label for="SegundoApellido"> Segundo Apellido: </label>
                <input type="text" class="form-control" name="SegundoApellido"value=<?php echo $v4;?> id="segundoapellido" placeholder="Introduce tu segundo apellido" required="required"> 
            </div>
            <div id="form-group">
                <br>
                <label for="FechaNacimiento"> Fecha de Nacimiento: </label>
                <input type="date" class="form-control" name="FechaNacimiento" value=<?php echo $v5;?> id="fechaNacimiento" placeholder="Introduce tu Fecha de Nacimiento" required="required"> 
            </div>
            <div id="form-group">
                <br>
                <label for="Email"> Correo Electrónico: </label>
                <input type="text" class="form-control" name="Email" value=<?php echo $v6;?> id="email" placeholder="Introduce tu correo electrónico" required="required"> 
            </div>
            <div id="form-group">
                <br>
                <label for="Celular"> Celular: </label>
                <input type="number" class="form-control" name="Celular" value=<?php echo $v7;?> id="celular" placeholder="Introduce tu celular" required="required"> 
            </div>
            <div id="form-group">
                <br>
                <label for="Dinero"> Dinero: </label>
                <input type="number" class="form-control" name="Dinero" value=<?php echo $v8;?> id="dinero" placeholder="Introduce el total de tu dinero" required="required"> 
            </div>          


            <div class="form-group"> <br>
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Modificar Jugador"></a>
            </div>
        </form>

        


    </div>

</body>
</html>