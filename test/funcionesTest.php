<?php 

require_once('../funciones.php');

class funcionesTest extends PHPUnit_Framework_TestCase
{
	private $funciones = null;
	private $conexion = null;

	public function testModificarEmailUsuario(){
		//DATOS DEL USUARIO + EMAILNUEVO

		$username = "prueba";
		$emailNuevo = base64_encode(openssl_random_pseudo_bytes(10));

		//CAMBIAMOS EL EMAIL
		$this->funcion->modificarEmailUsuario($this->conexion, $emailNuevo, $username);

		//BUSCAMOS RESULTADOS CON EL NUEVO EMAIL
		$aux = $this->conexion->prepare('SELECT * FROM users WHERE email = :email');
		$aux->execute(array(
			':email' => $emailNuevo,
		));

		//SI SE ENCUENTRA RESULTADOS ES QUE SE HA AGREGADO CORRECTAMENTE
		$this->AssertTrue($aux->fetch() != false);
	}
}

 ?>