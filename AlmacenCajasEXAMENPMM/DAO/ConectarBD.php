<?php
    # Establecer la conexión con el servidor
    @$conexion= new mysqli("localhost","root","");

    // La @ delante de la instrucción impide que se genere un error de PHP y solo salga nuestro mensaje
    /*
    $conexion->connect_errno;
    $conexion:
        Es 0 cuando no hay error.
        1045 cuando el usuario o clave no es correcto.
        2002 cuando el server no es correcto
    */
    $conexion->set_charset("utf8");
    // para evitar que se interpreten mal las tildes y ñ.
    if(!$conexion->connect_errno){ 
        echo "<h2> Conexión establecida con el servidor</h2><br>"; 
        # Seleccionar la base de datos
        $conexion->select_db ("almacen_cajas_pmm") or die ("Base de Datos no encontrada");
        echo "<h2> Conexión establecida con la base de datos almacen_cajas_pmm</h2><br>";             
    }else{ 
        echo "<h2> No ha sido posible crear la conexión con el servidor</h2><br>"; 
    } 
?>
