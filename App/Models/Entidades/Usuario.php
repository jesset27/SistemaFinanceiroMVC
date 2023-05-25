<?php
class Usuario {
    private int $uso_id;
    private string $uso_nome;
    private string $uso_email;
    private string $uso_senha;
    private int $tus_id;

    public function __construct($uso_nome, $uso_email, $uso_senha, $tus_id) {
        $this->uso_nome = $uso_nome;
        $this->uso_email = $uso_email;
        $this->uso_senha = $uso_senha;
        $this->tus_id = $tus_id;
    }

    public function getUsoId() {
        return $this->uso_id;
    }

    public function setUsoId($uso_id) {
        $this->uso_id = $uso_id;
    }

    public function getUsoNome() {
        return $this->uso_nome;
    }

    public function setUsoNome($uso_nome) {
        $this->uso_nome = $uso_nome;
    }

    public function getUsoEmail() {
        return $this->uso_email;
    }

    public function setUsoEmail($uso_email) {
        $this->uso_email = $uso_email;
    }

    public function getUsoSenha() {
        return $this->uso_senha;
    }

    public function setUsoSenha($uso_senha) {
        $this->uso_senha = $uso_senha;
    }

    public function getTusId() {
        return $this->tus_id;
    }

    public function setTusId($tus_id) {
        $this->tus_id = $tus_id;
    }
}