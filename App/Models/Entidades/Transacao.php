<?php 
namespace App\Models\Entidades;
class Transacao {
    
    private int $tran_id;
    private int $tipo_id;
    private int $uso_id;
    private string $tran_data;
    private float $tran_valor;
    private string $tran_descricao;

    // public function __construct($tipo_id, $tran_data, $tran_valor, $tran_descricao){
    //     $this->tipo_id = $tipo_id;
    //     $this->tran_data = $tran_data;
    //     $this->tran_valor = $tran_valor;
    //     $this->tran_descricao = $tran_descricao;
    // }

    public function __get($nome_atributo)
	{
		return $this->$nome_atributo;
	}

    public function __set($nome_atributo, $value)
    {
        $this->$nome_atributo = $value;
    }
}