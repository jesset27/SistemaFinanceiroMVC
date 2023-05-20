<?php
class Transacao {
    private string $tran_data;
    private float $tran_valor;
    private string $tran_descricao;
    public function __construct($tran_data, $tran_valor, $tran_descricao){
        $this->tran_data = $tran_data;
        $this->tran_valor = $tran_valor;
        $this->tran_descricao = $tran_descricao;
    }
    public function __get($value){
        return $this->value;
    }
    public function __set($atr, $value){
        if (property_exists($this, $atr)) {
            $this->$atr = $value;
        } else {
            throw new Exception("A propriedade $atr não existe.");
        }
    }
}