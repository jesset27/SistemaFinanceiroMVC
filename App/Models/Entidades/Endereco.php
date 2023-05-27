<?php
require "../Entidades/Endereco.php";
class Endereco {
    private $end_id;
    private $uso_id;
    private $end_num;
    private $end_bairro;
    private $end_logradouro;
    private $end_cep;
    private $end_cidade;
    private $end_uf;
    
    public function __construct() {
        
    }

    public function getEndId() {
        return $this->end_id;
    }

    public function setEndId($end_id) {
        $this->end_id = $end_id;
    }

    public function getUsoId() {
        return $this->uso_id;
    }

    public function setUsoId($uso_id) {
        $this->uso_id = $uso_id;
    }

    public function getEndNum() {
        return $this->end_num;
    }

    public function setEndNum($end_num) {
        $this->end_num = $end_num;
    }

    public function getEndBairro() {
        return $this->end_bairro;
    }

    public function setEndBairro($end_bairro) {
        $this->end_bairro = $end_bairro;
    }

    public function getEndLogradouro() {
        return $this->end_logradouro;
    }

    public function setEndLogradouro($end_logradouro) {
        $this->end_logradouro = $end_logradouro;
    }

    public function getEndCep() {
        return $this->end_cep;
    }

    public function setEndCep($end_cep) {
        $this->end_cep = $end_cep;
    }

    public function getEndCidade() {
        return $this->end_cidade;
    }

    public function setEndCidade($end_cidade) {
        $this->end_cidade = $end_cidade;
    }

    public function getEndUf() {
        return $this->end_uf;
    }

    public function setEndUf($end_uf) {
        $this->end_uf = $end_uf;
    }
}