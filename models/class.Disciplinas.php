<?php

class disciplinas {
    private $id;
    private $nome_disciplina;
    private $ano;
    private $semestre;
    private $curso_id;
    private $cpf_docente;
   

    function getId() {return $this->id;}
    function getNomeDisciplina() {return $this->nome_disciplina;}
    function getAno() {return $this->ano;}
    function getSemestre() {return $this->semestre;}
    function getCursoId() {return $this->curso_id;}
    function getCpfDocente() {return $this->cpf_docente;}

    function setNomeDisciplina($n) {$this->nome_disciplina = $n;}
    function setAno($n) {$this->ano = $n;}
    function setSemestre($n) {$this->semestre = $n;}
    function setCpfDocente($n) {$this->cpf_docente = $n;}

    
    
}