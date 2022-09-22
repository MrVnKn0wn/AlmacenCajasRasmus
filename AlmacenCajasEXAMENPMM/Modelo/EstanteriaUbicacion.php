<?php
    include_once 'Estanteria.php';
class EstanteriaUbicacion extends Estanteria{
    private $pasillo; //Que pasillo es, su letra
    private $hueco; //En que hueco esta ubicado dentro de ese pasillo, el numero
    
    public function __construct($localizador, $material, $numLejas, $pasillo, $hueco) {
        parent::__construct($localizador, $material, $numLejas);
        $this->pasillo=$pasillo;
        $this->hueco=$hueco;
    }
    
    function getPasillo() {
        return $this->pasillo;
    }

    function getHueco() {
        return $this->hueco;
    }

    function setPasillo($pasillo) {
        $this->pasillo = $pasillo;
    }

    function setHueco($hueco) {
        $this->hueco = $hueco;
    }

        
    public function __toString() {
        
    }
    
}
