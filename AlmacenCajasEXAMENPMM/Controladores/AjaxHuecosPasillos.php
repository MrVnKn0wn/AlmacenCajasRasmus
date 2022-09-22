<?php
    include '../DAO/Operaciones.php';
    session_start();
    $Pasillo=$_REQUEST['Pasillo'];

    try{ //Esto hace que se busque que huecos estan libres en el pasillo elegido antes
        $ArrayHuecos=Operaciones::huecosLibres($Pasillo);
        $ArrayPas=$_SESSION['ArrayPasillos'];//Pasillos con huecos libres
        
        $bool=false;
            foreach($ArrayPas as $Object){ 
                if($Object->id==$Pasillo){
                    
                    for($i=1;$i<=$Object->numHuecos; $i++){
                        if($ArrayHuecos!=null){
                            //if(!in_array($i, $ArrayHuecos)){
                            foreach($ArrayHuecos as $Hueco){
                                if($i==$Hueco->hueco){
                                    $bool=true;
                                }    
                            }
                            if(!$bool){
                            echo "<option value='".$i."'>Hueco ".$i."</option>";
                            }
                            $bool=false;
                        }else{
                            echo "<option value='".$i."'>Hueco ".$i."</option>";
                        }
                    }
                }
        }

        exit;
        //header("Location:../Vistas/AltaEstanteria.php");
    } catch (ApplicationErrorException $ex) {
        header("Location:../Vistas/Error.php?Error=$e");
        exit;
    }

