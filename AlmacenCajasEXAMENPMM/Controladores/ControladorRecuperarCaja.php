<?php
    include '../DAO/Operaciones.php';
    include_once '../Modelo/Caja.php';
    include_once '../Modelo/CajaUbicacion.php';
    session_start();
    
    $idestanteria=$_REQUEST['estanteria'];
    
    $ArrayEst=$_SESSION['ArrayEstanteriasDisponibles'];
    foreach($ArrayEst as $Object){
        
     if($idestanteria==$Object->id){
    $estanteria=$Object->localizador;
    $posicion=$_REQUEST['posicion'];
    $Caja=$_SESSION['CajaAdmi'];
    
    $Caja->setEstanteria($estanteria);
    $Caja->setLeja($posicion);
    
    $LocalizadorCaja=$Caja->getLocalizador();
    }}
    try{
        Operaciones::recuperarCaja($Caja, $LocalizadorCaja);
        header("Location:../Vistas/Mensajes.php?Mensaje=Se ha recuperado correctamente la caja ".$LocalizadorCaja);
    }catch (CajaException $cx) {
        header("Location:../Vistas/Error.php?Error=$cx");
        exit;
    }