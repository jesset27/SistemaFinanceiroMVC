<?php 
class Transacao {
    private int $tran_id;
    private int $tipo_id;
    private int $uso_id;
    private string $tran_data;
    private float $tran_valor;
    private string $tran_descricao;

    public function __construct($tran_data, $tran_valor, $tran_descricao){
        $this->tran_data = $tran_data;
        $this->tran_valor = $tran_valor;
        $this->tran_descricao = $tran_descricao;
    }

    public function getTranId(): int {
        return $this->tran_id;
    }

    public function setTranId(int $tran_id): void {
        $this->tran_id = $tran_id;
    }

    public function getTipoId(): int {
        return $this->tipo_id;
    }

    public function setTipoId(int $tipo_id): void {
        $this->tipo_id = $tipo_id;
    }

    public function getUsoId(): int {
        return $this->uso_id;
    }

    public function setUsoId(int $uso_id): void {
        $this->uso_id = $uso_id;
    }

    public function getTranData(): string {
        return $this->tran_data;
    }

    public function setTranData(string $tran_data): void {
        $this->tran_data = $tran_data;
    }

    public function getTranValor(): float {
        return $this->tran_valor;
    }

    public function setTranValor(float $tran_valor): void {
        $this->tran_valor = $tran_valor;
    }

    public function getTranDescricao(): string {
        return $this->tran_descricao;
    }

    public function setTranDescricao(string $tran_descricao): void {
        $this->tran_descricao = $tran_descricao;
    }
}