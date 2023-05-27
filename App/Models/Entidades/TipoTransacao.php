<?php
class TipoUsuario {
    private $tipo_id;
    private $tipo_nome;
    
    public function __construct() {
        
    }

    public function getTipoId() {
        return $this->tipo_id;
    }

    public function setTipoId($tipo_id) {
        $this->tipo_id = $tipo_id;
    }

    public function getTipoNome() {
        return $this->tipo_nome;
    }

    public function setTipoNome($tipo_nome) {
        $this->tipo_nome = $tipo_nome;
    }
}