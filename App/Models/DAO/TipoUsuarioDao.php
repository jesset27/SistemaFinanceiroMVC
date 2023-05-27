<?php
namespace App\Models\DAO;
use App\Models\Entidades\TipoUsuario;
use Exception;

class TipoUsuarioDAO extends BaseDAO{
    public function getById ($id)
    {
        $resultado = $this->select("SELECT * FROM tipo_usuario WHERE id = $id");

        return $resultado->fetchObject(TipoUsuario::class);
    }

    public function listar ()
    {
        $resultado = $this->select("SELECT * FROM tipo_usuario");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, TipoUsuario::class);
    }

    public function salvar (TipoUsuario $tipoUsuario)
    {
        try {

            $tus_nome = $tipoUsuario->getTipoNome();

            return $this->insert('tipo_usuario',
             ":tus_nome",
             [
                ':tus_nome'     =>$tus_nome
            ]);
            
        }catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
        }
    }

    public function atualizar (TipoUsuario $tipoUsuario)
    {
        try {

            $tus_nome = $tipoUsuario->getTipoNome();

            return $this->update('tipo_usuario', 
                "tus_nome = :tus_nome",
                [
                    ':tus_nome'     =>$tus_nome,
                    ], 
                    "id = :id");
            
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }

    public function excluir (int $id)
    {
        try {

            return $this->delete('tipo_usuario', "id = $id");

        }catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o usuario. " . $e->getMessage(), 500);
        }
    }
}
