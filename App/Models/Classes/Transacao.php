<?php
class Transacao{
    private string $tranData;
    private float $tranValor;
    private string $tranDescricao;
    public function __construct($tranData, $tranValor, $tranDescricao){
        $this->tranData = $tranData;
        $this->tranValor = $tranValor;
        $this->tranDescricao;
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
    public function __toString() {
        
    }
}