<?php

namespace App\Models\Entidades;

class Endereco
{
    private $uso_id;
    private $end_id;
    private $end_num;
    private $end_bairro;
    private $end_logradouro;
    private $end_cep;
    private $end_cidade;
    private $end_uf;

    public function __get($nome_atributo)
	{
		return $this->$nome_atributo;
	}

    public function __set($nome_atributo, $value)
    {
        $this->$nome_atributo = $value;
    }
}