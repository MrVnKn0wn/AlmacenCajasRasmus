<?php

class ApplicationErrorException extends Exception {
    private $lugar;
    public function __construct($mensaje,$codigo,$lugar) {
        parent::__construct($mensaje, $codigo, null);
        $this->lugar=$lugar;
    }

    public function __toString() {
        return __CLASS__."   ".$this->message."    ".$this->code."<br>".
                "     ".$this->lugar."<br>";
    }

}
