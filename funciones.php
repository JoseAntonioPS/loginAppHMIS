<?php 
class funciones{
//COMPROBADA
	function modificarEmailUsuario($conexion, $emailNuevo, $username){
		$errores = '';

		$resultado = $this->existeEmail($conexion, $emailNuevo)->fetch();
		if($resultado == false){
			$statement = $conexion->prepare('
				UPDATE users set email = :email WHERE username = :username'
			);

			$statement->execute(array(
				':email' => $emailNuevo,
				':username' => $username 
			));
		}else{
			$errores .= '<li>El email ya existe.</li>';
		}
		
		return $errores;
	}

  function recibirInfor($conexion, $username){
		$statement = $conexion->prepare('SELECT * FROM users WHERE username = :username');

		$statement->execute(array(
			':username' => $username
		));

		return $statement;
	} 	
	
	function existeEmail($conexion, $email) {
	$statement = $conexion->prepare('SELECT * FROM users WHERE email = :email LIMIT 1');
	$statement->execute(array(':email' => $email));

	return $statement;
	}

	function existeUser($conexion, $usuario){
		$statement = $conexion->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
		$statement->execute(array(':username' => $usuario));

		return $statement;
	}

	function registrarUser($conexion, $email, $usuario, $password){
		$statement = $conexion->prepare('INSERT INTO loginhmis.users(email, username, password) VALUES (:email, :username, :password)');
		$statement->execute(array(
			':email' => $email, 
			':username' => $usuario, 
			':password' => $password
		));
	}
}

?>

