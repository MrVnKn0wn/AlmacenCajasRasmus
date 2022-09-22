<?php

class Estanteria{
    private $id;
    private $localizador;
    private $material;
    private $numLejas;
    private $lejasLibres;
    private $fechaAlta;
    
    public function __construct($localizador, $material, $numLejas){
        $this->localizador = $localizador;
        $this->material = $material;
        $this->numLejas = $numLejas;
    }
    
    function getId() {
        return $this->id;
    }
    
    function getLocalizador() {
        return $this->localizador;
    }

    function getMaterial() {
        return $this->material;
    }

    function getNumLejas() {
        return $this->numLejas;
    }

    function getLejasLibres() {
        return $this->lejasLibres;
    }

    function getFechaAlta() {
        return $this->fechaAlta;
    }

    function setId($id) {
        $this->id = $id;
    }
    
    function setFechaAlta($fechaAlta) {
        $this->fechaAlta = $fechaAlta;
    }
    
    function setLocalizador($localizador) {
        $this->localizador = $localizador;
    }

    function setMaterial($material) {
        $this->material = $material;
    }

    function setNumLejas($numLejas) {
        $this->numLejas = $numLejas;
    }

    function setLejasLibres($lejasLibres) {
        $this->lejasLibres = $lejasLibres;
    }

    public function __toString() {
        
    }
    
}

