<?php 
class TipoUsuario {
    private $tipo_nome;
    
    public function __construct($tipo_nome) {
        $this->tipo_nome = $tipo_nome;
    }

    public function getTipoNome() {
        return $this->tipo_nome;
    }

    public function setTipoNome($tipo_nome) {
        $this->tipo_nome = $tipo_nome;
    }
}