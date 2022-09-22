<?php

    include '../DAO/Operaciones.php';
    include_once '../Modelo/Caja.php';
    include_once '../Modelo/CajaUbicacion.php';
    
    session_start();
    try{
        
       try{
        $ArrayEstanteriasDisponibles= Operaciones::estanteriasDisponibles();
        $_SESSION['ArrayEstanteriasDisponibles']=$ArrayEstanteriasDisponibles; //Array de todos los pasillos que tengo al menos un hueco
        
        
        }catch(ApplicationErrorException $e){
        header("Location:../Vistas/Error.php?Error=$e");     
        exit;
        }
    
        if($_REQUEST['opcion']=="baja"){
            $ListaCajas= Operaciones::listarCajas();    
            $_SESSION['TodasCajas']=$ListaCajas;
            header("Location:../Vistas/Administrar-Caja.php?opcion=baja");
        } else if($_REQUEST['opcion']=="devol"){
            $ListaCajas= Operaciones::listaCajasBackup();    
            $_SESSION['TodasCajas']=$ListaCajas;
            header("Location:../Vistas/Administrar-Caja.php?opcion=devol");
        }
    } catch (CajaException $ex) {
        header("Location:../Vistas/Error.php?Error=$ex");
    } 
