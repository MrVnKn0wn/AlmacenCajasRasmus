<?php

include 'ConectarBD.php';  
include '../Modelo/ApplicationErrorException.php';
include '../Modelo/EstanteriaException.php';
include '../Modelo/EstanteriaConUbicacionException.php';
include '../Modelo/CajaException.php';
include_once '../Modelo/Estanteria.php';
include_once '../Modelo/EstanteriaUbicacion.php';
include_once '../Modelo/Caja.php';
include_once '../Modelo/CajaUbicacion.php';

class Operaciones {
     public static function pasillosDisponibles(){
         global $conexion;
         
         $ArrayPasillos=array();
         
         $consulta="SELECT * FROM pasillo WHERE huecosLibres>0";
         
         $resultado=$conexion->query($consulta);
        if($resultado->num_rows>0){
            $Obj=$resultado->fetch_object(); 
            while($Obj){
                $ArrayPasillos[]=$Obj;
                $Obj=$resultado->fetch_object();
            }
            return $ArrayPasillos;             
        }else{//lanzo excepción
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="Coger Pasillos Disponibles en pasillosDisponibles()";
            throw new ApplicationErrorException($Mensaje,$Codigo,$Lugar);
        }
    }
    
    public static function estanteriasDisponibles(){
        global $conexion;
        
        $ArrayEstanterias=array();
        
        $consulta="SELECT * FROM estanteria WHERE lejasLibres>0";
        
        $resultado=$conexion->query($consulta);
        if($resultado->num_rows>0){
            $Obj=$resultado->fetch_object(); 
            while($Obj){
                $ArrayEstanterias[]=$Obj;
                $Obj=$resultado->fetch_object();
            }
            return $ArrayEstanterias;             
        }else{//lanzo excepción
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="Coger Estanterias Disponibles en estanteriasDisponibles()";
            throw new ApplicationErrorException($Mensaje,$Codigo,$Lugar);
        }
    }
    
    public static function huecosLibres($Pasillo){
        global $conexion;
        
        $ArrayHuecos=array();
        
        $consulta="SELECT * FROM pasillo_estanteria WHERE pasillo=?";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->bind_param("i",$Pasillo);
        $estado=$sentencia->execute();
        $resultado=$sentencia->get_result();
        
        if($estado!=null&&$resultado->num_rows>0){ 
             $Obj=$resultado->fetch_object(); 
             while($Obj){             
                $ArrayHuecos[]=$Obj;
                $Obj=$resultado->fetch_object();                
            }
            return $ArrayHuecos;
        }else{
            return null;
        }
    }
    
    public static function lejasLibres($Estanteria){
        global $conexion;
        
        $ArrayLejas=array();
        
        $consulta="SELECT * FROM estanteria_caja WHERE estanteria=?";
        $sentencia=$conexion->prepare($consulta);
        $sentencia->bind_param("i",$Estanteria);
        $estado=$sentencia->execute();
        $resultado=$sentencia->get_result();
        if($estado!=null&&$resultado->num_rows>0){ 
             $Obj=$resultado->fetch_object(); 
             while($Obj){             
                $ArrayLejas[]=$Obj;
                $Obj=$resultado->fetch_object();                
            }
            return $ArrayLejas;
        }else{
            return null;
        }
    }

    public static function cajasDisponibles($Localizador){
        global $conexion;
        
        $consulta1="SELECT localizador FROM caja WHERE localizador=?";   
        $sentencia1=$conexion->prepare($consulta1);
        $sentencia1->bind_param("s",$Localizador);
        $estado1=$sentencia1->execute();
        $resultado1=$sentencia1->get_result();
        
        if ($resultado1->num_rows==0) {
            
            $consulta2="SELECT localizador FROM caja_backup WHERE localizador=?";   
            $sentencia2=$conexion->prepare($consulta2);
            $sentencia2->bind_param("s",$Localizador);
            $estado2=$sentencia2->execute();
            $resultado2=$sentencia2->get_result();
            
            if ($resultado2->num_rows==0) {
                return false;
            }else {return true;}
   
        } else {return true;}

    }
    
    public static function insertarEstanteria($ObjEstanteria, $IDPasillo, $NumHueco){
        global $conexion;
        
        $localizador=$ObjEstanteria->getLocalizador();
        $material=$ObjEstanteria->getMaterial();
        $numLejas=$ObjEstanteria->getNumLejas();
        //Insertar la estanteria en sí
        $ordenSQL="INSERT INTO estanteria (localizador, material, numLejas, lejasLibres) VALUES (?,?,?,?)";
        $sentencia=$conexion->prepare($ordenSQL);
        $sentencia->bind_param("ssii", $localizador, $material, $numLejas, $numLejas);
        $resultado=$sentencia->execute();
        
        $IDEstanteria=$conexion->insert_id; 
        
        if($resultado==null){
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="Estanteria no dada de alta en insertarEstanteria() al insertar estanteria";
            if($Codigo=='1062'){
            $Lugar="Ese localizador de estanteria ya esta en uso, por favor use otro distinto";
            }
            throw new EstanteriaException($Mensaje,$Codigo,$Lugar);
        }
        
        //Esto actualiza el hueco libre del pasillo
        $ordenSQL3="UPDATE pasillo SET huecosLibres=huecosLibres-1 WHERE id='$IDPasillo'";
        
        $resultado3=$conexion->query($ordenSQL3);
        if($conexion->affected_rows!=1){
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="Pasillo no actualizado al hacer alta en insertarEstanteria() al hacer UPDATE de pasillo";
            throw new ApplicationErrorException($Mensaje,$Codigo,$Lugar);
        }
        //Crear la tabla intermedia para su ubicación
        $ordenSQL2="INSERT INTO pasillo_estanteria (pasillo, estanteria, hueco) VALUES (?,?,?)";
        $sentencia2=$conexion->prepare($ordenSQL2);
        $sentencia2->bind_param("iii", $IDPasillo, $IDEstanteria ,$NumHueco);
        $resultado2=$sentencia2->execute();
        
        if($resultado2==null){
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="Estanteria no dada de alta en insertarEstanteria() al insertar pasillo_estanteria";
            throw new EstanteriaConUbicacionException($Mensaje,$Codigo,$Lugar);
        }
        
        return;           
    }
    
    public static function insertarCaja($CajaUbicacion){
        global $conexion;
        //$Localizador, $Altura, $Anchura, $Color, $Material, $Contenido, $IDEstanteria, $NumLeja
        $localizador=$CajaUbicacion->getLocalizador();
        $altura=$CajaUbicacion->getAltura();
        $anchura=$CajaUbicacion->getAnchura();
        $color=$CajaUbicacion->getColor();
        $material=$CajaUbicacion->getMaterial();
        $contenido=$CajaUbicacion->getContenido();
        $estanteria=$CajaUbicacion->getEstanteria();
        $numLeja=$CajaUbicacion->getLeja();
        
        $ordenSQL="INSERT INTO caja (localizador, altura, anchura, color, material, contenido) VALUES (?,?,?,?,?,?)";
        $sentencia=$conexion->prepare($ordenSQL);
        $sentencia->bind_param("sddsss", $localizador, $altura, $anchura, $color, $material, $contenido );
        $resultado=$sentencia->execute();
        
        $IDCaja=$conexion->insert_id; 
        
        if($resultado==null){
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="Caja no dada de alta en insertarCaja() al insertar caja";
            if($Codigo=='1062'){
            $Lugar="Ese localizador de caja ya esta en uso, por favor use otro distinto";
            }
            throw new CajaException($Mensaje,$Codigo,$Lugar);
        }
        
        $ordenSQL3="UPDATE estanteria SET lejasLibres=lejasLibres-1 WHERE id='$estanteria'";
        
        $resultado3=$conexion->query($ordenSQL3);
        if($conexion->affected_rows!=1){
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="Estanteria no actualizada al hacer alta de caja en insertarCaja() al hacer actualizar estanteria";
            throw new CajaException($Mensaje,$Codigo,$Lugar);
        }
        
        $ordenSQL2="INSERT INTO estanteria_caja (caja, estanteria, numLeja) VALUES (?,?,?)";
        $sentencia2=$conexion->prepare($ordenSQL2);
        $sentencia2->bind_param("iii", $IDCaja, $estanteria ,$numLeja);
        $resultado2=$sentencia2->execute();
        
        if($resultado2==null){
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="Caja no dada de alta en insertarCaja() al insertar estanteria_caja";
            throw new CajaException($Mensaje,$Codigo,$Lugar);
        }
        
        return; 
    }
    
    public static function listarEstanterias(){
        global $conexion;
        
        $ordenSQL="SELECT e.id, e.localizador, e.material, e.numLejas, e.lejasLibres, e.fechaAlta, p.letra, pe.hueco "
                . "FROM estanteria e, pasillo_estanteria pe, pasillo p WHERE pe.pasillo=p.id AND pe.estanteria=e.id ORDER BY p.letra";
                
        $resultado=$conexion->query($ordenSQL);
        
        if($resultado){
            if($resultado->num_rows==0){
            return null;
            }
            $fila=$resultado->fetch_assoc(); //Metemos los datos en objetos de tipo EstanteriaUbicacion
            while($fila){
                $Id=$fila['id'];
                $Localizador=$fila['localizador'];
                $Material=$fila['material'];
                $NumLejas=$fila['numLejas'];
                $LejasLibres=$fila['lejasLibres'];
                $FechaAlta=$fila['fechaAlta'];
                $Letra=$fila['letra'];
                $Hueco=$fila['hueco'];
                
                $ObjEstanteriaUbicacion=new EstanteriaUbicacion($Localizador, $Material, $NumLejas, $Letra, $Hueco);
                $ObjEstanteriaUbicacion->setId($Id);
                $ObjEstanteriaUbicacion->setLejasLibres($LejasLibres);
                $ObjEstanteriaUbicacion->setFechaAlta($FechaAlta);
                
                $ListaEstanterias[]=$ObjEstanteriaUbicacion;    
                $fila=$resultado->fetch_assoc();
                
            }
            return $ListaEstanterias;
        }else{
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="La lista no se puede mostrar en insertarEstanteria()";
            throw new EstanteriaConUbicacionException($Mensaje,$Codigo,$Lugar); 
        }
    }
    
    public static function listarCajas(){
        global $conexion;
        
        $ordenSQL="SELECT c.id, c.localizador, c.altura , c.anchura , c.color, c.material, c.contenido, c.fechaEntrada , e.localizador AS locaEs, ec.numLeja
FROM caja c, estanteria_caja ec, estanteria e WHERE ec.estanteria=e.id AND ec.caja=c.id ORDER BY e.localizador ";
                
        $resultado=$conexion->query($ordenSQL);
        
        if($resultado){
            if($resultado->num_rows==0){
            return null;
            }
            $fila=$resultado->fetch_assoc(); //Metemos los datos en objetos de tipo CajaUbicacion
            while($fila){
                $Id=$fila['id'];
                $Localizador=$fila['localizador'];
                $Altura=$fila['altura'];
                $Anchura=$fila['anchura'];
                $Color=$fila['color'];
                $Material=$fila['material'];
                $Contenido=$fila['contenido'];
                $FechaAlta=$fila['fechaEntrada'];
                $Estanteria=$fila['locaEs'];
                $Leja=$fila['numLeja'];
                
                $ObjCajaUbicacion=new CajaUbicacion($Localizador, $Altura, $Anchura, $Color, $Material, $Contenido, $Estanteria, $Leja);                
                $ObjCajaUbicacion->setId($Id);
                $ObjCajaUbicacion->setFechaEntrada($FechaAlta);
                
                $ListaCajas[]=$ObjCajaUbicacion;    
                $fila=$resultado->fetch_assoc();
                
            }
            return $ListaCajas;
        }else{
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="La lista no se puede mostrar en listarCajas()";
            throw new CajaException($Mensaje,$Codigo,$Lugar); 
        }
    }
    
    public static function listaCajasBackup(){
        global $conexion;
        
        $ArrayCajasBU = array();
        
        $ordenSQL="SELECT c.id, c.localizador, c.altura , c.anchura , c.color, c.material, c.contenido, c.fechaSalida, c.fechaEntrada , e.localizador AS locaEs, ec.numLeja
FROM caja_backup c, estanteria_caja_backup ec, estanteria e WHERE ec.id_estanteria=e.id AND ec.id_caja_backup=c.id ORDER BY e.localizador ";
        
        $resultado = $conexion->query($ordenSQL);
        
        if($resultado){
            $fila=$resultado->fetch_assoc(); 
            while($fila){
                $Id=$fila['id'];
                $Localizador=$fila['localizador'];
                $Altura=$fila['altura'];
                $Anchura=$fila['anchura'];
                $Color=$fila['color'];
                $Material=$fila['material'];
                $Contenido=$fila['contenido'];
                $FechaSalida=$fila['fechaSalida'];
                $FechaAlta=$fila['fechaEntrada'];
                $Estanteria=$fila['locaEs'];
                $Leja=$fila['numLeja'];
                
                $ObjCajaUbicacion=new CajaUbicacion($Localizador, $Altura, $Anchura, $Color, $Material, $Contenido, $Estanteria, $Leja);                
                $ObjCajaUbicacion->setId($Id);
                $ObjCajaUbicacion->setFechaEntrada($FechaAlta);
                $ObjCajaUbicacion->setFechaSalidaBU($FechaSalida);
                
                $ArrayCajasBU[]=$ObjCajaUbicacion;    
                $fila=$resultado->fetch_assoc();
                
            }
            return $ArrayCajasBU;
        }else{
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="La lista no se puede mostrar en listaCajasBackup()";
            throw new CajaException($Mensaje,$Codigo,$Lugar); 
        }
    }
    
    public static function listadoInventario(){ 
        global $conexion;
        
        $ArrayInventario = array();
        $orderSQL = "
        SELECT *, e.localizador AS locaEs, c.localizador AS locaCa, e.material AS mateEs, c.material AS mateCa FROM estanteria e 
    LEFT JOIN estanteria_caja o ON o.estanteria=e.id
    LEFT JOIN caja c ON c.id=o.caja
    LEFT JOIN pasillo_estanteria u ON u.estanteria=e.id
    LEFT JOIN pasillo p ON p.id=u.pasillo
    ORDER BY p.letra,u.hueco, o.numLeja";
        $resultado=$conexion->query($orderSQL);
        if($resultado->num_rows>0){
            $Obj=$resultado->fetch_object(); 
            while($Obj){
                $ArrayInventario[]=$Obj;
                $Obj=$resultado->fetch_object();
            }
            return $ArrayInventario;             
        }else{
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="No se ha podido listar inventario en listadoInventario()";  
            throw new ApplicationErrorException($Mensaje,$Codigo,$Lugar);
        }
          
    }
    
    public static function borrarCaja($LocalizadorCaja){
        global $conexion;
        
        $ordenSQL="DELETE FROM caja WHERE localizador=?";
        $sentencia=$conexion->prepare($ordenSQL);
        $sentencia->bind_param("s", $LocalizadorCaja);
        $resultado=$sentencia->execute(); 
        if($conexion->affected_rows!=1){
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="Caja no dada de baja en borrarCaja() al hacer delete";
            throw new CajaException($Mensaje,$Codigo,$Lugar);
        }else {
            return;
        } 
    }
    
    public static function recuperarCaja($ObjCaja, $LocalizadorCaja){
        global $conexion;
        
        include '../Modelo/TriggerRecuperarCaja.php';
        
        $ordenSQL="DELETE FROM caja_backup WHERE localizador=?";
        $sentencia=$conexion->prepare($ordenSQL);
        $sentencia->bind_param("s", $LocalizadorCaja);
        $resultado=$sentencia->execute(); 
        if($conexion->affected_rows!=1){ //if($resultado&&resultado2&&resultado3){ return?} else { error }
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="Caja no recuperada en recuperarCaja() al hacer delete";
            if($Codigo=='1062'){
            $Lugar="La caja no puede ser devuelta ya que, otra caja ocupa su lugar";
            }
            throw new CajaException($Mensaje,$Codigo,$Lugar);
        }else {
            return;
        }  
    }     
    
    public static function comprobarSiHayAdmin(){
        global $conexion;
        
        $ordenSQL="SELECT * FROM admin";
        $sentencia=$conexion->prepare($ordenSQL);
        $estado=$sentencia->execute();
        $resultado=$sentencia->get_result();
        if($estado!=null&&$resultado->num_rows>0){ 
            return true;
        }else{
            return false;
        }
    } 
    
    public static function iniciarSesion($usuario, $password) {
        global $conexion;
        $sql = $conexion->prepare("SELECT * FROM admin WHERE usuario=?");
        $sql->bind_param("s", $usuario);
        $sql->execute();
        $resultado = $sql->get_result();

        if ($resultado->num_rows > 0) {
            $fila = $resultado->fetch_assoc();
            $passbd = $fila['password'];
        
    //comprobar contraseña
        if (password_verify($password, $passbd)) {
            return;
        }} else {
            $mensaje = $conexion->error;
            $codigo = $conexion->errno;
            $lugar = 'No se ha podido iniciar sesión en iniciarSesion()';
            throw new ApplicationErrorException($mensaje, $codigo, $lugar);
        }
    }     
    
    public static function registrarAdmin($usuario, $password){
        global $conexion;
        $Enc= password_hash($password, PASSWORD_BCRYPT);
        $ordenSQL="INSERT INTO admin VALUES (null,?,?)";
        $sentencia=$conexion->prepare($ordenSQL);
        $sentencia->bind_param("ss", $usuario ,$Enc);
        $resultado=$sentencia->execute();
        
        if($resultado==null){
            $Mensaje=$conexion->err;
            $Codigo=$conexion->errno;
            $Lugar="Admin no registrado en registrarAdmin() al insertar admin";
            throw new ApplicationErrorException($Mensaje,$Codigo,$Lugar);
        }      
    }
    
}
