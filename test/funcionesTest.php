<?php 

require_once('../funciones.php');

class funcionesTest extends PHPUnit_Framework_TestCase
{
	private $funciones = null;
	private $conexion = null;

	public function setUp(){
		$this->funcion = new funciones();
		try {
			$this->conexion = new PDO('mysql:host=localhost;dbname=loginhmis', 'root', '');
		} catch (PDOException $e) {
			echo "Error: " . $e->getMessage();
		}
	}

	public function testRecibirInfo(){
	$username = 'prueba2';

	//USUARIO EXISTENTE
	$aux = $this->funcion->recibirInfor($this->conexion, $username)->fetch();
	$this->AssertTrue($aux[1] == $username);

	//USUARIO NO EXISTENTE
	$username = 'qwertbvcxsder';
	$aux = $this->funcion->recibirInfor($this->conexion, $username)->fetch();
	$this->AssertTrue($aux == false);
	}

}

 ?>
