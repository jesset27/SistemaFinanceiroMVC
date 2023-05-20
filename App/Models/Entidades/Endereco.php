<?php 
class Usuario{
    private int $end_num;
    private string $end_bairro;
    private string $end_logradouro;
    private string $end_cep;
    private string $end_cidade;
    private string $end_uf;
    public function __construct($end_num, $end_bairro, $end_logradouro, $end_cep, $end_cidade, $end_uf){
        $this->end_num = $end_num;
        $this->end_bairro = $end_bairro;
        $this->end_logradouro = $end_logradouro;
        $this->end_cep = $end_cep;
        $this->end_cidade = $end_cidade;
        $this->end_uf = $end_uf;
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