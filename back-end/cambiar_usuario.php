<?php

require '../config/config.php';
require '../functions.php';

session_start();

if(isset($_SESSION['usuario'])){
    $conexion = conexion($bd_config);

    if(!$conexion){

        header('Location: error');
        die();
        
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if(isset($_POST['username']) && !empty($_POST['username']) && isset($_POST['password']) && !empty($_POST['password']) ){

            $username = $_POST['username'];
            $password = hash('sha512',$_POST['password']);
            
            $statement = $conexion->prepare('UPDATE usuario SET username=:username, password=:password');
            $statement->execute(

                array(
                    ':username' => $username,
                    ':password' => $password
                )

            );

            $num_filas_afectadas = $statement->rowCount();

            if($num_filas_afectadas>0){

                echo 1;

            }
        }

    }

}