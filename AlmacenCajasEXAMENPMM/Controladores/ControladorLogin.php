<?php

include "../DAO/Operaciones.php";
include_once "../Modelo/ApplicationErrorException.php";

$usuario = $_REQUEST['usuario'];
$password = $_REQUEST['password'];

//session_start();
try {
    Operaciones::iniciarSesion($usuario, $password);
    header("Location:../Vistas/Home.html");
} catch (ApplicationErrorException $AE) {
    header("Location:../Vistas/Error.php?Error=No se ha podido iniciar sesión, intentelo de nuevo");
}
