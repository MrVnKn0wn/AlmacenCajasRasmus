<?php
    include '../DAO/Operaciones.php';
    include_once '../Modelo/Estanteria.php';
    session_start();
    
    $Localizador=$_REQUEST['code'];
    $Material=$_REQUEST['material'];
    $NumLejas=$_REQUEST['numLejas'];
    $IDPasillo=$_REQUEST['pasillo'];
    $NumHueco=$_REQUEST['posicion'];
    
    $Estanteria=new Estanteria($Localizador, $Material, $NumLejas);
    
    $conexion->autocommit(false);
    try{
        Operaciones::insertarEstanteria($Estanteria,$IDPasillo,$NumHueco);
        $conexion->commit();
        $conexion->autocommit(true);
        header("Location:../Vistas/Mensajes.php?Mensaje=Alta de estanteria correcta");
    }catch (EstanteriaException $ex) {
        $conexion->rollback();
        $conexion->autocommit(true);
        header("Location:../Vistas/Error.php?Error=$ex");
    }catch (ApplicationErrorException $AEX){
        $conexion->rollback();
        $conexion->autocommit(true);
        header("Location:../Vistas/Error.php?Error=$AEX");
    }catch (EstanteriaConUbicacionException $ecux){
        $conexion->rollback();
        $conexion->autocommit(true);
        header("Location:../Vistas/Error.php?Error=$ecux");
    }
    
    
    
    

