<?php

namespace App\Models\DAO;

use App\Models\Entidades\Usuario;
use Exception;
use PDO;

class UsuarioDAO extends BaseDAO
{
    public function getById($id)
    {
        $resultado = $this->select("SELECT * FROM usuario WHERE uso_id = $id");

        return $resultado->fetchObject(Usuario::class,);
    }

    public function listar()
    {
        $resultado = $this->select("SELECT * FROM usuario");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Usuario::class);
    }

    public function salvar(Usuario $usuario)
    {
        try {

            $nome = $usuario->__get("uso_nome");
            $email = $usuario->__get("uso_email");
            $senha = $usuario->__get("uso_senha");
            $tusId = $usuario->__get("tus_id");

            return $this->insert(
                'usuario',
                ":uso_nome, :uso_email, :uso_senha, :tus_id",
                [
                    ':uso_nome'     => $nome,
                    ':uso_email'    => $email,
                    ':uso_senha'    => $senha,
                    ':tus_id'       => $tusId
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
        }
    }

    public function atualizar(Usuario $usuario)
    {
        try {

            $id = $usuario->__get("uso_id");
            $nome = $usuario->__get("uso_nome");
            $email = $usuario->__get("uso_email");
            $senha = $usuario->__get("uso_senha");
            $tusId = $usuario->__get("tus_id");

            return $this->update(
                'usuario',
                "uso_nome = :uso_nome, uso_email = :uso_email, uso_senha = :uso_senha, tus_id = :tus_id ",
                [
                    ':uso_id'       => $id,
                    ':uso_nome'     => $nome,
                    ':uso_email'    => $email,
                    ':uso_senha'    => $senha,
                    ':tus_id'       => $tusId
                ],
                "uso_id = :uso_id"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }

    public function atualizarPassword(Usuario $usuario)
    {
        try {

            $uso_id      = $usuario->__get("uso_id");
            $uso_senha   = $usuario->__get("uso_senha");

            return $this->update(
                'usuario',
                "uso_senha = :uso_senha",

                [
                    ':uso_id'       => $uso_id,
                    ':uso_senha' => $uso_senha
                ],
                "uso_id = :uso_id"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados." . $e->getMessage(), 500);
        }
    }


    public function excluir(int $id)
    {
        try {

            return $this->delete('usuario', "uso_id = $id");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o usuario. " . $e->getMessage(), 500);
        }
    }

    public function autenticar($uso_nome, $uso_senha)
    {

        try {

            $query = $this->select(
                "SELECT * FROM usuario WHERE uso_nome = '$uso_nome'"
            );

            $usuario = $query->fetchObject(Usuario::class,);

            if (!$usuario) {
                return 0;
            }
            print_r($usuario);

            if (!password_verify($uso_senha, $usuario->__get("uso_senha"))) {
                return 0;
            }

            return $usuario->__get("uso_id");

        } catch (\Exception $e) {
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function verificaEmail($uso_email)
    {
        try {

            $query = $this->select(
                "SELECT * FROM usuario WHERE uso_email = '$uso_email'"
            );
            return $query->fetch();
        } catch (\Exception $e) {
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }

    public function verificaUsuario($name)
    {
        try {

            $query = $this->select(
                "SELECT * FROM usuario WHERE uso_nome = '$name'"
            );
            return $query->fetch();
        } catch (\Exception $e) {
            throw new \Exception("Erro no acesso aos dados.", 500);
        }
    }
}
