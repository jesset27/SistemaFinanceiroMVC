<?php 
namespace App\Models\DAO;
use App\Models\Entidades\Transacao;
use Exception;

class TransacaoDAO extends BaseDAO{
    public function getById ($id)
    {
        $resultado = $this->select("SELECT * FROM transacao WHERE id = $id");

        return $resultado->fetchObject(Transacao::class);
    }

    public function listar ()
    {
        $resultado = $this->select("SELECT * FROM trasacao");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Transacao::class);
    }

    public function salvar (Transacao $transacao)
    {
        try {
            $tipo_id = $transacao->getTipoId();
            $uso_id = $transacao->getUsoId();
            $tran_data = $transacao->getTranData();
            $tran_valor = $transacao->getTranValor();
            $tran_descricao = $transacao->getTranDescricao();

            return $this->insert('transacao',
             ":tipo_id, :uso_id, :tran_data, :tran_valor, :tran_descricao",
             [
                    ':tipo_id' => $tipo_id,
                    ':uso_id:' => $uso_id,
                    ':tran_data' => $tran_data,
                    ':tran_valor' => $tran_valor,
                    ':tran_descricao' => $tran_descricao
            ]);
            
        }catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
        }
    }

    public function atualizar (Transacao $transacao)
    {
        try {
            $tipo_id = $transacao->getTipoId();
            $uso_id = $transacao->getUsoId();
            $tran_data = $transacao->getTranData();
            $tran_valor = $transacao->getTranValor();
            $tran_descricao = $transacao->getTranDescricao();

            return $this->update('usuario', 
                "tipo_id = :tipo_id, uso_id = :uso_id, tran_data = :tran_data, tran_valor = :tran_valor, tran_descricao = :tran_descricao",
                [
                    ':tipo_id' => $tipo_id,
                    ':uso_id:' => $uso_id,
                    ':tran_data' => $tran_data,
                    ':tran_valor' => $tran_valor,
                    ':tran_descricao' => $tran_descricao
                    ], 
                    "id = :id");
            
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }

    public function excluir (int $id)
    {
        try {

            return $this->delete('transacao', "id = $id");

        }catch (\Exception $e) {
            throw new \Exception("Erro ao excluir a transacao. " . $e->getMessage(), 500);
        }
    }
}
