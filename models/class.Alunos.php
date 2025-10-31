<?php

class alunos {
    private $cpf;
    private $matricula;
    private $nome;
    private $email;
    private $status_aluno;
    private $data_nascimento;
    private $telefone;
    private $endereco;
    private $bairro;
    private $cidade;
    private $uf;
    private $curso_id;
    private $ano_de_ingresso;
    private $psicopedagogo;
    private $monitor;
    private $necessita_monitor;
    private $ano;
    private $semestre;
    private $cpf_responsavel;



    function getCpf() {return $this->cpf;}
    function getMatricula() {return $this->matricula;}
    function getNome() {return $this->nome;}
    function getEmail() {return $this->email;}
    function getStatusAluno() {return $this->status_aluno;}
    function getDataNascimento() {return $this->data_nascimento;}
    function getTelefone() {return $this->telefone;}
    function getEndereco() {return $this->endereco;}
    function getBairro() {return $this->bairro;}
    function getCidade() {return $this->cidade;}
    function getUf() {return $this->uf;}
    function getCursoId() {return $this->curso_id;}
    function getAnoDeIngresso() {return $this->ano_de_ingresso;}
    function getPsicopedagogo() {return $this->psicopedagogo;}
    function getMonitor() {return $this->monitor;}
    function getNecessitaMonitor() {return $this->necessita_monitor;}
    function getAno() {return $this->ano;}
    function getSemestre() {return $this->semestre;}
    function getCpfResponsavel() {return $this->cpf_responsavel;}
    
    
    function setCpf($n) {$this->cpf = $n;}
    function setMatricula($n) {$this->matricula = $n;}
    function setSenha($n) {$this->senha = $n;}
    function setNome($n) {$this->nome = $n;}
    function setEmail($n) {$this->email = $n;}
    function setStatusAluno($n) {$this->status_aluno = $n;}
    function setDataNascimento($n) {$this->data_nascimento = $n;}
    function setTelefone($n) {$this->telefone = $n;}
    function setEndereco($n) {$this->endereco = $n;}
    function setBairro($n) {$this->bairro = $n;}
    function setCidade($n) {$this->cidade = $n;}
    function setUf($n) {$this->uf = $n;}
    function setCursoId($n) {$this->curso_id = $n;}
    function setAnoDeIngresso($n) {$this->ano_de_ingresso = $n;}
    function setPsicopedagogo($n) {$this->psicopedagogo = $n;}
    function setMonitor($n) {$this->monitor = $n;}
    function setNecessitaMonitor($n) {$this->necessita_monitor = $n;}
    function setAno($n) {$this->ano = $n;}
    function setSemestre($n) {$this->semestre = $n;}
    function setCpfResponsavel($n) {$this->cpf_responsavel = $n;}
}