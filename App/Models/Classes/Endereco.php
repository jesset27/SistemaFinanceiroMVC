<?php 
class Usuario{
    private string $end_num;
    private string $end_bairro;
    private string $end_logradouro;
    public function __construct($end_num, $end_bairro, $end_logradouro){
        $this->end_num = $end_num;
        $this->end_bairro = $end_bairro;
        $this->end_logradouro = $end_logradouro;
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