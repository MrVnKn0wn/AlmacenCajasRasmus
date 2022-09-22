<?php
    include '../DAO/Operaciones.php';
    include_once '../Modelo/Caja.php';
    include_once '../Modelo/CajaUbicacion.php';
    session_start();
    
    $Caja=$_SESSION['CajaAdmi'];
    $LocalizadorCaja=$Caja->getLocalizador();
    
    try{
        Operaciones::borrarCaja($LocalizadorCaja);
        header("Location:../Vistas/Mensajes.php?Mensaje=Se ha dado de baja correctamente a la caja ".$LocalizadorCaja);
    }catch (CajaException $cx) {
        header("Location:../Vistas/Error.php?Error=$cx");
        exit;
    }


