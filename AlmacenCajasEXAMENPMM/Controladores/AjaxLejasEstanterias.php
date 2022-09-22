<?php
    include '../DAO/Operaciones.php';
    session_start();
    $Estanteria=$_REQUEST['Estanteria'];

    try{ //Esto hace que se busque que lejas estan libres en la estanteria elegida antes
        $ArrayLejas=Operaciones::lejasLibres($Estanteria);
        $ArrayEst=$_SESSION['ArrayEstanteriasDisponibles'];//Estanterias con lejas libres
        
        $bool=false;
            foreach($ArrayEst as $Object){ 
                if($Object->id==$Estanteria){
                    
                    for($i=1;$i<=$Object->numLejas; $i++){
                        if($ArrayLejas!=null){
                            
                            foreach($ArrayLejas as $Leja){
                                if($i==$Leja->numLeja){
                                    $bool=true;
                                }    
                            }
                            if(!$bool){
                            echo "<option value='".$i."'>Leja ".$i."</option>";
                            }
                            $bool=false;
                        }else{
                            echo "<option value='".$i."'>Leja ".$i."</option>";
                        }
                    }
                }
        }

        exit;
        
    } catch (ApplicationErrorException $ex) {
        header("Location:../Vistas/Error.php?Error=$e");
        exit;
    }