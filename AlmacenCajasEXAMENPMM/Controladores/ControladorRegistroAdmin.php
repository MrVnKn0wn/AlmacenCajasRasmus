<?php

include "../DAO/Operaciones.php";
include_once "../Modelo/ApplicationErrorException.php";

$usuario = $_REQUEST['usuario'];
$password = $_REQUEST['password'];

//session_start();
try {
    Operaciones::registrarAdmin($usuario, $password);
    header("Location:../Vistas/Home.html");
} catch (ApplicationErrorException $AE) {
    header("Location:../Vistas/Error.php?Error=No se ha podido registrar el admin, intentelo de nuevo");
}

