<?php
namespace App\Models\DAO;
use App\Models\Entidades\TipoTransacao;
use Exception;
class TipoTransacaoDAO extends BaseDAO{
    public function getById ($id)
    {
        $resultado = $this->select("SELECT * FROM tipo_transacao WHERE id = $id");

        return $resultado->fetchObject(TipoTransacao::class);
    }

    public function listar ()
    {
        $resultado = $this->select("SELECT * FROM tipo_transacao");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, TipoTransacao::class);
    }

    public function salvar (TipoTransacao $tipoTransacao)
    {
        try {

            $tipo_nome = $tipoTransacao->getTipoNome();

            return $this->insert('tipo_transacao',
             ":tipo_nome",
             [
                ':tipo_nome'     =>$tipo_nome
            ]);
            
        }catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
        }
    }

    public function atualizar (TipoTransacao $tipoTransacao)
    {
        try {

            $tipo_nome = $tipoTransacao->getTipoNome();

            return $this->update('tipo_usuario', 
                "tipo_nome = :tipo_nome",
                [
                    ':tipo_nome'     =>$tipo_nome,
                    ], 
                    "id = :id");
            
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }

    public function excluir (int $id)
    {
        try {

            return $this->delete('tipo_transacao', "id = $id");

        }catch (\Exception $e) {
            throw new \Exception("Erro ao excluir a transação. " . $e->getMessage(), 500);
        }
    }
}
