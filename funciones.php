<?php 
class funciones{

  	function recibirInfor($conexion, $username){
		$statement = $conexion->prepare('SELECT * FROM users WHERE username = :username');

		$statement->execute(array(
			':username' => $username
		));

		return $statement;
	}
}

?>
