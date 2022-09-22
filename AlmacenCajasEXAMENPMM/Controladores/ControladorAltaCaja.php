<?php
    include '../DAO/Operaciones.php';
    include_once '../Modelo/Caja.php';
    include_once '../Modelo/CajaUbicacion.php';
    session_start();
    
    $Localizador=$_REQUEST['code'];
    $Material=$_REQUEST['material'];
    $Color=$_REQUEST['color'];
    $Altura=$_REQUEST['altura'];
    $Anchura=$_REQUEST['anchura'];
    $Contenido=$_REQUEST['contenido'];
    $IDEstanteria=$_REQUEST['estanteria'];
    $NumLeja=$_REQUEST['posicion'];
    
    $CajaUbicacion=new CajaUbicacion($Localizador, $Altura, $Anchura, $Color, $Material, $Contenido, $IDEstanteria, $NumLeja);
    
    $conexion->autocommit(false);
    try{
        Operaciones::insertarCaja($CajaUbicacion);
        $conexion->commit();
        $conexion->autocommit(true);
        header("Location:../Vistas/Mensajes.php?Mensaje=Alta de caja correcta");
    }catch (CajaException $cx) {
        $conexion->rollback();
        $conexion->autocommit(true);
        header("Location:../Vistas/Error.php?Error=$cx");
    }
    