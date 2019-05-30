<?php session_start();


if(isset($_SESSION['usuario'])){	
	require 'funciones.php';
	$_SESSION['mensaje'] = '';
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$emailNuevo = filter_var(strtolower($_POST['emailNuevo']), FILTER_SANITIZE_STRING);
		$funcion = new funciones();

		$errores = '';

		if(empty($emailNuevo)){
			$errores .= '<li> Por favor rellena el campo correctamente</li>';
		}else{
			try {
				$conexion = new PDO('mysql:host=localhost;dbname=loginhmis', 'root', '');
			} catch (PDOException $e) {
				echo "Error: " . $e->getMessage();
			}

			$errores = $funcion->modificarEmailUsuario($conexion, $emailNuevo, $_SESSION['usuario']);

			if($errores == ''){
				$_SESSION['mensaje'] = 'Email cambiado con éxito';
				header('Location: index.php');
			}
		}
	}	
	require 'views/modificarEmailUsuario.view.php';
}else{
	header('Location: login.php');
}

 ?>