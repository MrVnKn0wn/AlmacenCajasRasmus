<?php
    include_once 'Caja.php';
class CajaUbicacion extends Caja{
    private $estanteria; 
    private $leja;
    private $fechaSalidaBU;//Para las cajas Backup
    
    public function __construct($localizador, $altura, $anchura, $color, $material, $contenido, $estanteria, $leja) {
        parent::__construct($localizador, $altura, $anchura, $color, $material, $contenido);
        $this->estanteria = $estanteria;
        $this->leja = $leja;
    }
    
    function getEstanteria() {
        return $this->estanteria;
    }

    function getLeja() {
        return $this->leja;
    }

    function setEstanteria($estanteria) {
        $this->estanteria = $estanteria;
    }

    function setLeja($leja) {
        $this->leja = $leja;
    }
    
    function getFechaSalidaBU() {
        return $this->fechaSalidaBU;
    }

    function setFechaSalidaBU($fechaSalidaBU) {
        $this->fechaSalidaBU = $fechaSalidaBU;
    }

    public function __toString() {
        if($this->getFechaSalidaBU()==null){
            return parent::__toString()." en la Estanteria " . $this->estanteria . " leja " . $this->leja;     
        }else{
          return parent::__toString().", en la Estanteria " . $this->estanteria . " leja " . $this->leja . " con salida en el ". $this->fechaSalidaBU; 
        }
    }

}

