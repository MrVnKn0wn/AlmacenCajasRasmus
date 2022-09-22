<?php
    include_once '../Modelo/Caja.php';
    include_once '../Modelo/CajaUbicacion.php';
    session_start();
    $Cajas = $_SESSION["TodasCajas"];
    $cajaSel= $_REQUEST["caja"];
            foreach($Cajas as $Caja){
                if($cajaSel==$Caja->getLocalizador()){ 
                    $_SESSION['CajaAdmi']=$Caja;
                    echo $Caja->__toString();
            }
                }
