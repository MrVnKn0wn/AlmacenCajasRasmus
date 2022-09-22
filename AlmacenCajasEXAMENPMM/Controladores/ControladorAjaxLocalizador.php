<?php
    include '../DAO/Operaciones.php';
    session_start();
    try{
        $Localizador=$_REQUEST['localizador'];
        $Resultado= Operaciones::cajasDisponibles($Localizador);
        if(!$Resultado){
            echo "False";
        }else{
            echo "True";
        }
        
    }catch(ApplicationErrorException $e){
        header("Location:../Vistas/Error.php?Error=$e");
        exit;
    }
    

