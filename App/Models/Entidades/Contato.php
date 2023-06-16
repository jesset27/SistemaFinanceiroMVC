<?php 
namespace App\Models\Entidades;
class Contato {
    private int $uso_id;
    private string $con_msg;
    private string $con_titulo;
    private string $con_lida;

    public function __get($nome_atributo)
	{
		return $this->$nome_atributo;
	}

    public function __set($nome_atributo, $value)
    {
        $this->$nome_atributo = $value;
    }
}
