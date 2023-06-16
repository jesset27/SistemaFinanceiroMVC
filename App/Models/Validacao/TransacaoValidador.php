<?php

namespace App\Models\Validacao;

use App\Models\Entidades\Transacao;
use \App\Models\Validacao\ResultadoValidacao;

class TransacaoValidador
{

    public function validar(Transacao $transacao)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if (empty($transacao->__get("tran_data"))) {
            $resultadoValidacao->addErro('tran_data', "Data: Este campo não pode ser vazio.");
        }

        if (empty($transacao->__get("tran_valor"))) {
            $resultadoValidacao->addErro('tran_valor', "Valor: Este campo não pode ser vazio.");
        }

        if (empty($transacao->__get("tran_descricao"))) {
            $resultadoValidacao->addErro('tran_descricao', "Descricao: Este campo não pode ser vazio");
        }

        return $resultadoValidacao;
    }
}
