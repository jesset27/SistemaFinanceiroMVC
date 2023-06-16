<?php

namespace App\Models\Validacao;

use \App\Models\Entidades\Contato;
use \App\Models\Validacao\ResultadoValidacao;

class ContatoValidador {

    public function validar(Contato $contato)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if(empty($contato->__get("con_msg")) || empty($contato->__get("con_titulo")))
        {
            $resultadoValidacao->addErro('con_msg',"Mensagem: Este campo não pode ser vazio.");
            $resultadoValidacao->addErro('con_titulo',"Título: Este campo não pode ser vazio.");
        }
          
        return $resultadoValidacao;
    }
}