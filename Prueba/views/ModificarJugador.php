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

        <form action="../logic/Modificar.php" method="post" role="form" id="formulario">
            <div id="form-group">
                <label for="Cedula"> Introduzca la cédula del jugador que desea modificar: </label>
                <input type="number" class="form-control" name="Cedula" id="cedula" placeholder="Introduce la cédula" required="required"> 
            </div> 

            <div class="form-group"> <br>
                <input class="btn btn-lg btn-primary btn-block" type="submit" value="Modificar Jugador"></a>
            </div>
        </form>

        


    </div>

</body>
</html>