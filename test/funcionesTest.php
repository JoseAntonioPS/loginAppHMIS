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

	public function testExisteEmail():void {
		//SI EXISTE
		$email = 'prueba2@prueba.com';
		$aux = $this->funcion->existeEmail($this->conexion, $email)->fetch();
		
		$this->AssertTrue($aux != false);

		//NO EXISTE
		$email = 'noexiste@prueba.com';
		$aux = $this->funcion->existeEmail($this->conexion, $email)->fetch();

		$this->AssertTrue(!($aux != false));
	}

	public function testExisteUser(){
		//SI EXISTE
		$username = 'prueba';
		$aux = $this->funcion->existeUser($this->conexion, $username)->fetch();
		
		$this->AssertTrue($aux != false);

		//NO EXISTE
		$username = 'noexiste';
		$aux = $this->funcion->existeUser($this->conexion, $username)->fetch();
		
		$this->AssertTrue(!($aux != false));
	}

	public function testRegistrarUser(){
		//AGREGAMOS UN USUARIO RANDOM
		$username = base64_encode(openssl_random_pseudo_bytes(10));
		$email = base64_encode(openssl_random_pseudo_bytes(10));
		$password = base64_encode(openssl_random_pseudo_bytes(10));

		$this->funcion->registrarUser($this->conexion, $email, $username, $password);

		//LO BUSCAMOS
		$aux = $this->conexion->prepare('SELECT * FROM users WHERE email = :email AND username = :username AND password = :password');
		$aux->execute(array(
			':email' => $email,
			':username' => $username,
			':password' => $password
		));

		//SI SE ENCUENTRA EL USUARIO ES QUE SE HA AGREGADO CORRECTAMENTE
		$this->AssertTrue($aux->fetch() != false);
	}
}

 ?>