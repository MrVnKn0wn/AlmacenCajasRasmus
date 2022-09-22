<?php
    include '../DAO/Operaciones.php';
    include_once '../Modelo/Caja.php';
    include_once '../Modelo/CajaUbicacion.php';

    session_start();
    try{
        $ListaCajas= Operaciones::listarCajas();    
        
        if($ListaCajas==null){
            header("Location:../Vistas/Error.php?Error=No tienes ninguna caja aún, prueba a dar de alta alguna");
            exit;
        }
        
        $_SESSION['ListaCajas']=$ListaCajas;
        header("Location:../Vistas/Lista-Cajas.php");
    } catch (CajaException $ex) {
        header("Location:../Vistas/Error.php?Error=$ex");
    }