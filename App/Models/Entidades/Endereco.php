<?php

namespace App\Models\Entidades;

class Endereco
{
    private $uso_id;
    private $end_num;
    private $end_bairro;
    private $end_logradouro;
    private $end_cep;
    private $end_cidade;
    private $end_uf;

    public function __construct($uso_id, $end_num, $end_bairro, $end_logradouro, $end_cep, $end_cidade, $end_uf)
    {
        $this->uso_id = $uso_id;
        $this->end_num = $end_num;
        $this->end_bairro = $end_bairro;
        $this->end_logradouro = $end_logradouro;
        $this->end_cep = $end_cep;
        $this->end_cidade = $end_cidade;
        $this->end_uf = $end_uf;
    }


    public function getUsoId()
    {
        return $this->uso_id;
    }

    public function setUsoId($uso_id)
    {
        $this->uso_id = $uso_id;
    }

    public function getEndNum()
    {
        return $this->end_num;
    }

    public function setEndNum($end_num)
    {
        $this->end_num = $end_num;
    }

    public function getEndBairro()
    {
        return $this->end_bairro;
    }

    public function setEndBairro($end_bairro)
    {
        $this->end_bairro = $end_bairro;
    }

    public function getEndLogradouro()
    {
        return $this->end_logradouro;
    }

    public function setEndLogradouro($end_logradouro)
    {
        $this->end_logradouro = $end_logradouro;
    }

    public function getEndCep()
    {
        return $this->end_cep;
    }

    public function setEndCep($end_cep)
    {
        $this->end_cep = $end_cep;
    }

    public function getEndCidade()
    {
        return $this->end_cidade;
    }

    public function setEndCidade($end_cidade)
    {
        $this->end_cidade = $end_cidade;
    }

    public function getEndUf()
    {
        return $this->end_uf;
    }

    public function setEndUf($end_uf)
    {
        $this->end_uf = $end_uf;
    }
}
