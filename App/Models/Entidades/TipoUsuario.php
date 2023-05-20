<?php 
class TipoUsuario {
    private string $tus_nome;
    public function __construct($tus_nome){
        $this->tus_nome = $tus_nome;
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