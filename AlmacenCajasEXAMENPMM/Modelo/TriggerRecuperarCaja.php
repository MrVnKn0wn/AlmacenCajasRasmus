<?php
$borrar = "DROP trigger if exists trigger_devolver_caja";

$resultado2 = $conexion->query($borrar)or die('Ha fallado el borrado del DROP');
$codigo = $ObjCaja->getLocalizador();
$altura = $ObjCaja->getAltura();
$anchura = $ObjCaja->getAnchura();
$color = $ObjCaja->getColor();
$material = $ObjCaja->getMaterial();
$contenido = $ObjCaja->getContenido();
$fechaAlta = $ObjCaja->getFechaEntrada();

$LocalizadorEstanteria = $ObjCaja->getEstanteria();
$leja = $ObjCaja->getLeja();

$trigger = 'CREATE TRIGGER TRIGGER_DEVOLVER_CAJA
    BEFORE DELETE
    ON caja_backup 
    FOR EACH ROW
BEGIN
    INSERT INTO caja (localizador,altura,anchura,color,material,contenido,fechaEntrada)
        VALUES ("' . $codigo . '", "' . $altura . '", "' . $anchura . '", "' . $color . '", "' . $material . '", "' . $contenido . '", "' . $fechaAlta . '");
        
    INSERT INTO estanteria_caja (caja,estanteria,numLeja) VALUES ((SELECT id FROM caja WHERE localizador="' . $codigo . '"),(SELECT id FROM estanteria WHERE localizador="' . $LocalizadorEstanteria . '"),"' . $leja . '");
  
    UPDATE estanteria SET lejasLibres = lejasLibres-1 WHERE id=(SELECT id FROM estanteria WHERE localizador="' . $LocalizadorEstanteria . '");
        
    DELETE FROM estanteria_caja_backup WHERE id_caja_backup=OLD.id;

END';


$resultado3 = $conexion->query($trigger)or die('el insert trigger ha fallado');
