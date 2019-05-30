<?php session_start();
require 'funciones.php';

if(isset($_SESSION['usuario'])){
	header('Location: index.php');
}

if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$email = filter_var(strtolower($_POST['email']), FILTER_SANITIZE_STRING);
	$usuario = filter_var(strtolower($_POST['usuario']), FILTER_SANITIZE_STRING);
	$password = $_POST['password'];
	$password2 = $_POST['password2'];

	$errores = '';
	$funcion = new funciones();

	if(empty($email) or empty($usuario) or empty($password) or empty($password2)){
		$errores .= '<li> Por favor rellena todos los datos correctamente</li>';
	}else{
		try {
			$conexion = new PDO('mysql:host=localhost;dbname=loginhmis', 'root', '');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}

		$statement = $funcion->existeEmail($conexion, $email);
		$resultado = $statement->fetch();

		if($resultado != false){
			$errores .= '<li>El email ya existe</li>';
		}

		$statement = $funcion->existeUser($conexion, $usuario);
		$resultado = $statement->fetch();

		if($resultado != false){
			$errores .= '<li>El nombre de usuario ya esta en uso</li>';
		}

		$password = hash('sha512', $password);
		$password2 = hash('sha512', $password2);

		if($password != $password2){
			$errores .= '<li>Las constraseñas no coinciden</li>';
		}
	}

	if($errores == ''){
		$funcion->registrarUser($conexion, $email, $usuario, $password);

		header('Location: login.php');
	}
}

require 'views/registro.view.php';
?>