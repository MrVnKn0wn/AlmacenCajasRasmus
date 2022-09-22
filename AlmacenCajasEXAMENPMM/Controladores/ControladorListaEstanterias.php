<?php
    include '../DAO/Operaciones.php';
    include_once '../Modelo/Estanteria.php';
    include_once '../Modelo/EstanteriaUbicacion.php';

    session_start();
    try{
        $ListaEstanterias= Operaciones::listarEstanterias();
        
        if($ListaEstanterias==null){
            header("Location:../Vistas/Error.php?Error=No tienes ninguna estanteria aún, prueba a dar de alta alguna");
            exit;
        }
        
        $_SESSION['ListaEstanterias']=$ListaEstanterias;
        header("Location:../Vistas/Lista-Estanterias.php");
    } catch (EstanteriaConUbicacionException $ex) {
        header("Location:../Vistas/Error.php?Error=$ex");
    }