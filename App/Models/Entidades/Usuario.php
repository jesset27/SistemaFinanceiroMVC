<?php

namespace App\Models\Entidades;

class Usuario
{

    private int $uso_id;
    private string $uso_nome;
    private string $uso_email;
    private string $uso_senha;
    private int $tus_id;

    public function __get($nome_atributo)
    {
        return $this->$nome_atributo;
    }

    public function __set($nome_atributo, $value)
    {
        $this->$nome_atributo = $value;
    }
}
