<?php 
namespace App\Models\DAO;
use App\Models\Entidades\Contato;
use Exception;
class ContatoDao extends BaseDAO{
    public function getById ($id)
    {
        $resultado = $this->select("SELECT * FROM contatos WHERE id = $id");

        return $resultado->fetchObject(Contato::class);
    }

    public function listar ()
    {
        $resultado = $this->select("SELECT * FROM contatos");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Contato::class);
    }

    public function salvar (Contato $contato)
    {
        try {

            $uso_id = $contato->getUsoId();
            $con_msg = $contato->getConMsg();
            $con_titulo = $contato->getConTitulo();
            $con_lida = $contato->getConLida();

            return $this->insert('contatos',
             ":uso_id, :con_msg, :con_titulo, :con_lida",
             [
                ':uso_id'       => $uso_id,
                ':con_msg'      => $con_msg,
                ':con_titulo'   => $con_titulo,
                ':con_lida'     => $con_lida
            ]);
            
        }catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
        }
    }

    public function atualizar (Contato $contato)
    {
        try {

            $uso_id = $contato->getUsoId();
            $con_msg = $contato->getConMsg();
            $con_titulo = $contato->getConTitulo();
            $con_lida = $contato->getConLida();

            return $this->update('contatos', 
                "uso_id = :uso_id, con_mgs = :con_mgs, con_titulo = :con_titulo, con_lida = :con_lida ",
                [
                    ':uso_id'       => $uso_id,
                    ':con_mgs'      => $con_msg,
                    ':con_titulo'   => $con_titulo,
                    ':con_lida'     => $con_lida
                    ], 
                    "id = :id");
            
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }

    public function excluir (int $id)
    {
        try {

            return $this->delete('contatos', "id = $id");

        }catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o contato. " . $e->getMessage(), 500);
        }
    }
}