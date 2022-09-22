<?php
    include '../DAO/Operaciones.php';
    session_start();

    try{
        $boolHayUser=Operaciones::comprobarSiHayAdmin();
        if($boolHayUser){
        header("Location:../Vistas/Login.php?hayuser=true");
        }else {
            header("Location:../Vistas/Login.php?hayuser=false");
        }
    }catch (ApplicationErrorException $cx) {
        header("Location:../Vistas/Error.php?Error=$cx");
        exit;
    }

