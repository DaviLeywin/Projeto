<?php

class nivelDeUsuario {
    private $nivel;
    private $nivel_id;
   
    function getNivel() {return $this->nivel;}
    function getNivelId() {return $this->nivel_id;}

    function setNivel($n) {$this->nivel = $n;}
    function setNivelId($n) {$this->nivel_id = $n;}

}