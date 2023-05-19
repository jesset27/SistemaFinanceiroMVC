<?php 
class Usuario{
    private string $uso_email;
    private string $uso_senha;
    public function __construct($uso_email, $uso_senha){
        $this->uso_email = $uso_email;
        $this->uso_senha = $uso_senha;
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