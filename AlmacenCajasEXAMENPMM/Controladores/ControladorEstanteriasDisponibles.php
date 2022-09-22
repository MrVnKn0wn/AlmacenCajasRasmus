<?php
    include '../DAO/Operaciones.php';
    session_start();
    try{
        $ArrayEstanteriasDisponibles= Operaciones::estanteriasDisponibles();
        $_SESSION['ArrayEstanteriasDisponibles']=$ArrayEstanteriasDisponibles; //Array de todos los pasillos que tengo al menos un hueco
        header("Location:../Vistas/AltaCaja.php");
        
    }catch(ApplicationErrorException $e){
        header("Location:../Vistas/Error.php?Error=$e");
                //"VistaErrores.php?Error=$e");
        exit;
    }
    
?>
