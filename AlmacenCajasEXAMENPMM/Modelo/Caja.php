<?php

class Caja{
    private $id;
    private $localizador;
    private $altura;
    private $anchura;
    private $color;
    private $material;
    private $contenido;
    private $fechaEntrada;
    
    public function __construct($localizador, $altura, $anchura, $color, $material, $contenido) {
        $this->localizador = $localizador;
        $this->altura = $altura;
        $this->anchura = $anchura;
        $this->color = $color;
        $this->material = $material;
        $this->contenido = $contenido;
    }
    
    function getId() {
        return $this->id;
    }

    function getLocalizador() {
        return $this->localizador;
    }

    function getAltura() {
        return $this->altura;
    }

    function getAnchura() {
        return $this->anchura;
    }

    function getColor() {
        return $this->color;
    }

    function getMaterial() {
        return $this->material;
    }

    function getContenido() {
        return $this->contenido;
    }

    function getFechaEntrada() {
        return $this->fechaEntrada;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setLocalizador($localizador) {
        $this->localizador = $localizador;
    }

    function setAltura($altura) {
        $this->altura = $altura;
    }

    function setAnchura($anchura) {
        $this->anchura = $anchura;
    }

    function setColor($color) {
        $this->color = $color;
    }

    function setMaterial($material) {
        $this->material = $material;
    }

    function setContenido($contenido) {
        $this->contenido = $contenido;
    }

    function setFechaEntrada($fechaEntrada) {
        $this->fechaEntrada = $fechaEntrada;
    }

    public function __toString() {
        return $this->altura . "/" . $this->anchura . " cm, de color " . "<div style='background-color:".$this->color."; border:1px solid black; height:20px; width:50px; display:inline-block;'></div>" . " , con " . $this->contenido  . " , con fecha de entrada en " . $this->fechaEntrada;
    }
}

