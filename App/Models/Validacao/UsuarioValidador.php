<?php

namespace App\Models\Validacao;

use \App\Models\Validacao\ResultadoValidacao;
use \App\Models\Entidades\Usuario;

class UsuarioValidador
{

    public function validar(Usuario $usuario)
    {
        $resultadoValidacao = new ResultadoValidacao();

        if (empty($usuario->__get("uso_nome"))) {
            $resultadoValidacao->addErro('nome', "Nome: Este campo não pode ser vazio.");
        }

        if (empty($usuario->__get("uso_email"))) {
            $resultadoValidacao->addErro('email', "E-Mail: Este campo não pode ser vazio.");
        }

        if (empty($usuario->__get("uso_senha"))) {
            $resultadoValidacao->addErro('senha', "Senha: Este campo não pode ser vazio");
        }
        return $resultadoValidacao;
    }
}
