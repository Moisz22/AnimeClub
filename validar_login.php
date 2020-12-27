<?php
session_start();
require 'config/config.php';
require 'functions.php';

$conexion = conexion($bd_config);

if(!$conexion){
	echo 'error al verificar :(';
}

	$usuario = $_POST['usuario'];
	$password = $_POST['password'];

	$statement = $conexion->prepare("SELECT * FROM usuarios WHERE username=:username && password=:password LIMIT 1");
	$statement->execute(array(
		':username' => $usuario,
		':password' => $password
	)
	);
	$resultado = $statement->fetchAll();

	if($resultado){
		$_SESSION['usuario'] = $resultado['username'];
		echo 'sesion iniciada';
	}elseif(!$resultado){
		echo 'usuario o contraseña incorrectos';
	}

?>

