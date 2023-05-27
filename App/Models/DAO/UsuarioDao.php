<?php 
namespace App\Models\DAO;
use App\Models\Entidades\Usuario;
use Exception;

class UsuarioDAO extends BaseDAO{
    public function getById ($id)
    {
        $resultado = $this->select("SELECT * FROM usuario WHERE id = $id");

        return $resultado->fetchObject(Usuario::class);
    }

    public function listar ()
    {
        $resultado = $this->select("SELECT * FROM usuario");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Usuario::class);
    }

    public function salvar (Usuario $usuario)
    {
        try {

            $nome = $usuario->getNome();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $tusId = $usuario->getTusId();

            return $this->insert('usuario',
             ":nome, :email, :senha, tusId",
             [
                ':nome'     =>$nome,
                ':email'    =>$email,
                ':senha'    =>$senha,
                ':tusId'    =>$tusId
            ]);
            
        }catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
        }
    }

    public function atualizar (Usuario $usuario)
    {
        try {

            $id = $usuario->getId();
            $nome = $usuario->getNome();
            $email = $usuario->getEmail();
            $senha = $usuario->getSenha();
            $tusId = $usuario->getTusId();

            return $this->update('usuario', 
                "nome = :nome",
                [
                    ':id'       =>$id, 
                    ':nome'     =>$nome,
                    ':email'    =>$email,
                    ':senha'    =>$senha,
                    ':tusId'    =>$tusId

                    ], 
                    "id = :id");
            
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }

    public function excluir (int $id)
    {
        try {

            return $this->delete('usuario', "id = $id");

        }catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o usuario. " . $e->getMessage(), 500);
        }
    }
}
