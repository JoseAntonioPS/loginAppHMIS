<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/estilos.css">
	<title>HOME - Administrador</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">
			Bienvenido usuario
			<?php echo $_SESSION['usuario']?>
		</h1>
		<hr class="border">
		<br>
		<div class="contenido">
			<table>
				    <tr class="presentacion">
				        <th style="text-align: left;">Email</th>
				        <td> <?php echo $resultado[0]; ?></td>
				    </tr>
				    <tr class="presentacion">
				        <th style="text-align: left;">Usuario</th>
				        <td> <?php echo $resultado[1]; ?></td>
				    </tr>
				    <tr class="presentacion">
				        <th style="text-align: left;">ONLINE</th>
				        <td> <?php echo $resultado[3]; ?></td>
				    </tr>
				    <tr class="presentacion">
				        <th style="text-align: left;">Tipo de usuario</th>
				        <td> <?php echo $resultado[4]; ?></td>
				    </tr>
				    <tr class="presentacion">
				        <th style="text-align: left;">Fecha de registro</th>
				        <td> <?php echo $resultado[5]; ?></td>
				    </tr>
				    <tr class="presentacion">
				        <th style="text-align: left;">Fecha último acceso</th>
				        <td> <?php echo $resultado[6]; ?></td>
				    </tr>

				</table>
				
			</div>
		<br>
		<hr class="border">
		<p><a class="myButton" style="float: left;" href="gestionarUsuariosAdministrador.php">Volver atrás</a></p>
		<a href="cerrar.php" style="float: right;" class="myButton">Cerrar Sesion</a>
		
	</div>
</body>
</html>