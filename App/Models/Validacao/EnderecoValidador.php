<?php

namespace App\Models\Validacao;

use App\Models\Entidades\Endereco;
use \App\Models\Validacao\ResultadoValidacao;

class EnderecoValidador {

    public function validar(Endereco $endereco)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($endereco->getEndUf()))
        {
            $resultadoValidacao->addErro('uf',"UF: Este campo não pode ser vazio.");
        }

        if(empty($endereco->getEndCep()))
        {
            $resultadoValidacao->addErro('cep',"CEP: Este campo não pode ser vazio.");
        }

        if(empty($endereco->getEndCidade()))
        {
            $resultadoValidacao->addErro('cidade',"Cidade: Este campo não pode ser vazio");
        }

        if(empty($endereco->getEndLogradouro()))
        {
            $resultadoValidacao->addErro('logradouro',"Logradouro: Este campo não pode ser vazio");
        }

        if(empty($endereco->getEndNum()))
        {
            $resultadoValidacao->addErro('num',"Número: Este campo não pode ser vazio");
        }

        if(empty($endereco->getEndBairro("end_bairro")))
        {
            $resultadoValidacao->addErro('bairro',"Bairro: Este campo não pode ser vazio");
        }

        return $resultadoValidacao;
    }
}