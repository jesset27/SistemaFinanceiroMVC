<?php
require "../Entidades/TipoTransacao.php";
class TipoUsuarioDao {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function inserir(TipoUsuario $tipoUsuario) {
        $sql = "INSERT INTO tipo_usuario (tipo_nome) VALUES (?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $tipoUsuario->getTipoNome());
        $stmt->execute();
        $tipoUsuario->setTipoId($this->conexao->lastInsertId());
        return $stmt->rowCount();
    }

    public function alterar(TipoUsuario $tipoUsuario) {
        $sql = "UPDATE tipo_usuario SET tipo_nome = ? WHERE tipo_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $tipoUsuario->getTipoNome());
        $stmt->bindParam(2, $tipoUsuario->getTipoId());
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function remover($id) {
        $sql = "DELETE FROM tipo_usuario WHERE tipo_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM tipo_usuario WHERE tipo_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listar() {
        $tiposUsuario = array();
        $sql = "SELECT * FROM tipo_usuario";
        $stmt = $this->conexao->query($sql);

        while ($tipoUsuarioArray = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $tipoUsuario = new TipoUsuario();
            $tipoUsuario->setTipoId($tipoUsuarioArray['tipo_id']);
            $tipoUsuario->setTipoNome($tipoUsuarioArray['tipo_nome']);
            array_push($tiposUsuario, $tipoUsuario);
        }

        return $tiposUsuario;
    }
}