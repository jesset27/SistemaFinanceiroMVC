<?php
namespace App\Models\Entidades;
class Usuario {
    private int $id;
    private string $nome;
    private string $email;
    private string $senha;
    private int $tusid;

    public function construct($nome, $email, $senha, $tusid) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
        $this->tusid = $tusid;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getTusId() {
        return $this->tusid;
    }

    public function setTusId($tusid) {
        $this->tusid = $tusid;
    }
}