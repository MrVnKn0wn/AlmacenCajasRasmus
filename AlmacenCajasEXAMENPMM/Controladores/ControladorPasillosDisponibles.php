<?php
    include '../DAO/Operaciones.php';
    session_start();
    try{
        $ArrayPasillos= Operaciones::pasillosDisponibles();
        $_SESSION['ArrayPasillos']=$ArrayPasillos; //Array de todos los pasillos que tengo al menos un hueco
        header("Location:../Vistas/AltaEstanteria.php");
        
    }catch(ApplicationErrorException $e){
        header("Location:../Vistas/Error.php?Error=$e");
                //"VistaErrores.php?Error=$e");
        exit;
    }
    
?>

