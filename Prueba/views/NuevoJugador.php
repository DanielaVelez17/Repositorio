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

        <form action="../logic/Registrarse.php" method="post" role="form" id="formulario">
            <div id="form-group">
                <label for="Cedula"> Cédula: </label>
                <input type="number" class="form-control" name="Cedula" id="cedula" placeholder="Introduce tu cédula" required="required"> 
            </div>
            <div id="form-group">
                <br>
                <label for="Nombre"> Nombre: </label>
                <input type="text" class="form-control" name="Nombre" id="nombre" placeholder="Introduce tu nombre" required="required"> 
            </div>
            <div id="form-group">
                <br>
                <label for="PrimerApellido"> Primer Apellido: </label>
                <input type="text" class="form-control" name="PrimerApellido" id="primerapellido" placeholder="Introduce tu primer apellido" required="required"> 
            </div>
            <div id="form-group">
                <br>
                <label for="SegundoApellido"> Segundo Apellido: </label>
                <input type="text" class="form-control" name="SegundoApellido" id="segundoapellido" placeholder="Introduce tu segundo apellido" required="required"> 
            </div>
            <div id="form-group">
                <br>
                <label for="FechaNacimiento"> Fecha de Nacimiento: </label>
                <input type="date" class="form-control" name="FechaNacimiento" id="fechaNacimiento" placeholder="Introduce tu Fecha de Nacimiento" required="required"> 
            </div>
            <div id="form-group">
                <br>
                <label for="Email"> Correo Electrónico: </label>
                <input type="text" class="form-control" name="Email" id="email" placeholder="Introduce tu correo electrónico" required="required"> 
            </div>
            <div id="form-group">
                <br>
                <label for="Celular"> Celular: </label>
                <input type="number" class="form-control" name="Celular" id="celular" placeholder="Introduce tu celular" required="required"> 
            </div>
            <div id="form-group">
                <br>
                <label for="Dinero"> Dinero: </label>
                <input type="number" class="form-control" name="Dinero" id="dinero" placeholder="Introduce el total de tu dinero" required="required"> 
            </div>          


            <div class="form-group"> <br>
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Crear Jugador"></a>
            </div>
        </form>

        


    </div>

</body>
</html>