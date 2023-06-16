<?php

namespace App\Models\Validacao;

use \App\Models\Entidades\Endereco;
use \App\Models\Validacao\ResultadoValidacao;

class EnderecoValidador
{

    public function validar(Endereco $endereco)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if (empty($endereco->__get("end_num"))) {
            $resultadoValidacao->addErro('end_num', "Número: Este campo não pode ser vazio.");
        }

        if (empty($endereco->__get("end_bairro"))) {
            $resultadoValidacao->addErro('end_bairro', "Bairro: Este campo não pode ser vazio.");
        }

        if (empty($endereco->__get("end_logradouro"))) {
            $resultadoValidacao->addErro('end_logradouro', "Logradouro: Este campo não pode ser vazio.");
        }

        if (empty($endereco->__get("end_cep"))) {
            $resultadoValidacao->addErro('end_cep', "CEP: Este campo não pode ser vazio.");
        }

        if (empty($endereco->__get("end_cidade"))) {
            $resultadoValidacao->addErro('end_cidade', "Cidade: Este campo não pode ser vazio.");
        }

        if (empty($endereco->__get("end_uf"))) {
            $resultadoValidacao->addErro('end_uf', "UF: Este campo não pode ser vazio.");
        }

        return $resultadoValidacao;
    }
}