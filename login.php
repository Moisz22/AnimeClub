<?php session_start();
require 'config/config.php';
require 'functions.php';

$errores = '';

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$usuario = limpiarDatos($_POST['user']);
	$password = limpiarDatos($_POST['password']);
	if($usuario == $login['usuario'] && $password == $login['contra']){
		$_SESSION['usuario'] = $usuario;
		header('Location:lista_animes.php');
	}else{
		$errores .= '<li>Usuario o contraseña no validos</li>';
	}
}

require 'views/login.view.php';

?>