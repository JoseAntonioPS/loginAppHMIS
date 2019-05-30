<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	<link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/estilos.css">
	<title>Modificar email</title>
</head>
<body>
	<div class="contenedor">
		<h1 class="titulo">
			Bienvenido usuario
			<?php echo $_SESSION['usuario']?>
		</h1>
		<hr class="border">
		
		<div class="contenido">
			<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method='POST' class="formulario" name="modificarEmail">
				<h3>Modificar email</h3>
				<br>
				<div class="form-group">
					<i class="icono izquierda fa fa-envelope-o"></i><input type="text" name="emailNuevo" class="email_btn" placeholder="Introducir email">
					<i class="submit-btn fa fa-arrow-right" onclick="modificarEmail.submit()"></i>
				</div>
				<?php if(!empty($errores)): ?>
					<div class="error">
						<ul>
							<?php echo $errores ?>
						</ul>
					</div>
				<?php endif; ?>
				<br>
			</form>
		</div>
		<hr class="border">
		<br>
		<a href="contenidoUsuario.php" style="float: left;" class="myButton">Volver atrás</a>
		<a href="cerrar.php" style="float: right;" class="myButton">Cerrar Sesion</a>
		
	</div>
</body>
</html>