<?php
require "../Entidades/Usuario.php";

class UsuarioDAO
{
    private $conexao;

    public function __construct($conexao)
    {
        $this->conexao = $conexao;
    }

    public function inserir(Usuario $usuario)
    {
        $sql = "INSERT INTO usuario (uso_nome, uso_email, uso_senha, tus_id) VALUES (?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $usuario->getUsoNome());
        $stmt->bindParam(2, $usuario->getUsoEmail());
        $stmt->bindParam(3, $usuario->getUsoSenha());
        $stmt->bindParam(4, $usuario->getTusId());
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function alterar(Usuario $usuario)
    {
        $sql = "UPDATE usuario SET uso_nome = ?, uso_email = ?, uso_senha = ?, tus_id = ? WHERE uso_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $usuario->getUsoNome());
        $stmt->bindParam(2, $usuario->getUsoEmail());
        $stmt->bindParam(3, $usuario->getUsoSenha());
        $stmt->bindParam(4, $usuario->getTusId());
        $stmt->bindParam(5, $usuario->getUsoId());
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function remover($id)
    {
        $sql = "DELETE FROM usuario WHERE uso_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
    public function listar()
    {
        $usuarios = array();
        $sql = "SELECT * FROM usuario";
        $stmt = $this->conexao->prepare($sql);
        $stmt->execute();

        while ($usuario_array = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuario = new Usuario(
                $usuario_array['uso_nome'],
                $usuario_array['uso_email'],
                $usuario_array['uso_senha'],
                $usuario_array['tus_id']
            );
            $usuario->setUsoId($usuario_array['uso_id']);
            array_push($usuarios, $usuario);
        }

        return $usuarios;
    }
}
