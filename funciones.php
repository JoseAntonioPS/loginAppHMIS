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
}

?>