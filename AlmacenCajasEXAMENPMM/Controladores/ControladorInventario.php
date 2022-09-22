<?php
    include '../DAO/Operaciones.php';
    include_once '../Modelo/Caja.php';
    include_once '../Modelo/CajaUbicacion.php';
    include_once '../Modelo/Estanteria.php';
    include_once '../Modelo/EstanteriaUbicacion.php';
    session_start();
    
    try {
        $ArrayInventario = Operaciones::listadoInventario();
        $_SESSION['ArrayInventario'] = $ArrayInventario;
        header("Location:../Vistas/Inventario.php"); 
    } catch (ApplicationErrorException $ex) {
        header("Location:../Vistas/Error.php?Error=$ex / Es posible que aún no se tenga ningún elemento, prueba a añadir una estanteria");
    }
