<?php

namespace App\Models\Validacao;

use App\Models\Entidades\Transacao;
use \App\Models\Validacao\ResultadoValidacao;

class TransacaoValidador {

    public function validar(Transacao $transacao)
    {
        $resultadoValidacao = new ResultadoValidacao();
        
        if(empty($transacao->__get("tran_data")) || empty($transacao->__get("tran_valor")) || empty($transacao->__get("tran_descricao")))
        {
            $resultadoValidacao->addErro('data',"Data: Este campo não pode ser vazio.");
            $resultadoValidacao->addErro('valor',"Valor: Este campo não pode ser vazio.");
            $resultadoValidacao->addErro('descricao',"Descricao: Este campo não pode ser vazio");
        }
        
        return $resultadoValidacao;
    }
}