<?php 
class TipoTransicao{
    private string $tusNome;
    public function __construct($tusNome){
        $this->tusNome = $tusNome;
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