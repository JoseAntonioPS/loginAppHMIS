<?php session_start();
require 'funciones.php';

if(isset($_SESSION['usuario'])){
	$username = isset($_REQUEST['username']) ? filter_var(strtolower($_REQUEST['username']), FILTER_SANITIZE_STRING) : null;

	$funcion = new funciones();
	try {
		$conexion = new PDO('mysql:host=localhost;dbname=loginhmis', 'root', '');
	} catch (PDOException $e) {
		echo "Error: " . $e->getMessage();
		
	}

	$statement = $funcion->recibirInfor($conexion, $username);
	$resultado = $statement->fetch();

	if($resultado[3] == 0){
		$resultado[3] = 'NO';
	}else{
		$resultado[3] = 'SI';
	}

	if($resultado[4] == 1){
			$resultado[4] = 'USUARIO ADMINISTRADOR';
		}elseif($resultado[4] == 2){
			$resultado[4] = 'ADMIN MASTER';
		}else{
			$resultado[4] = ' USUARIO POR DEFECTO';
		}

	if($resultado[6] == null){
		$resultado[6] = 'No ha logueado nunca';
	}

	require 'views/informacion.view.php';
}else{
	header('Location: login.php');
}

 ?>