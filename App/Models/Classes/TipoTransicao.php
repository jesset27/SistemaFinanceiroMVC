<?php 
class TipoTransicao{
    private string $tipoNome;
    public function __construct($tipoNome){
        $this->tipoNome = $tipoNome;
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