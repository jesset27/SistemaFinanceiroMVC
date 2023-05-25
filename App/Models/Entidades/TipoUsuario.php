<?php 
class TipoUsuario {
    private int $tipo_id;
    private string $tipo_nome;

    public function __construct($tipo_nome) {
        $this->tipo_nome = $tipo_nome;
    }

    public function getTipoId(): int {
        return $this->tipo_id;
    }

    public function setTipoId(int $tipo_id): void {
        $this->tipo_id = $tipo_id;
    }

    public function getTipoNome(): string {
        return $this->tipo_nome;
    }

    public function setTipoNome(string $tipo_nome): void {
        $this->tipo_nome = $tipo_nome;
    }
}
