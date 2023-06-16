<?php

namespace App\Models\DAO;

use App\Models\Entidades\Transacao;

class TransacaoDAO extends BaseDAO
{
    public function getById($id)
    {
        $resultado = $this->select("SELECT * FROM transacao WHERE tran_id = $id");

        return $resultado->fetchObject(Transacao::class);
    }

    public function listarTransacao($tipo_transacao, $uso_id, $data_ano, $data_mes)
    {
        $resultado = $this->select("SELECT * FROM transacao WHERE tipo_id = $tipo_transacao AND uso_id = $uso_id AND YEAR(tran_data) = $data_ano AND MONTH(tran_data) = $data_mes ORDER BY tran_data");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Transacao::class);
    }

    public function salvar(Transacao $transacao)
    {
        try {
            $tipo_id = $transacao->__get("tipo_id");
            $uso_id = $transacao->__get("uso_id");
            $tran_data = $transacao->__get("tran_data");
            $tran_valor = $transacao->__get("tran_valor");
            $tran_descricao = $transacao->__get("tran_descricao");

            return $this->insert(
                'transacao',
                ":tipo_id, :uso_id, :tran_data, :tran_valor, :tran_descricao",
                [
                    ':tipo_id' => $tipo_id,
                    ':uso_id' => $uso_id,
                    ':tran_data' => $tran_data,
                    ':tran_valor' => $tran_valor,
                    ':tran_descricao' => $tran_descricao
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
        }
    }

    public function atualizar(Transacao $transacao)
    {
        try {
            $tran_id = $transacao->__get("tran_id");
            $tipo_id = $transacao->__get("tipo_id");
            $tran_data = $transacao->__get("tran_data");
            $tran_valor = $transacao->__get("tran_valor");
            $tran_descricao = $transacao->__get("tran_descricao");

            return $this->update(
                'transacao',
                "tipo_id = :tipo_id, tran_data = :tran_data, tran_valor = :tran_valor, tran_descricao = :tran_descricao",
                [
                    ':tran_id' => $tran_id,
                    ':tipo_id' => $tipo_id,
                    ':tran_data' => $tran_data,
                    ':tran_valor' => $tran_valor,
                    ':tran_descricao' => $tran_descricao
                ],
                "tran_id = :tran_id"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }

    public function excluir(int $id)
    {
        try {

            return $this->delete('transacao', "tran_id = $id");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir a transacao. " . $e->getMessage(), 500);
        }
    }
}
