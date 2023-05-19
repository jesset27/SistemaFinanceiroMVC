<?php 
class Contato{
    private string $con_msg;
    private string $con_titulo;
    private string $con_lida;
    public function __construct($con_msg, $con_titulo, $con_lida){
        $this->con_msg = $con_msg;
        $this->con_titulo = $con_titulo;
        $this->con_lida = $con_lida;
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