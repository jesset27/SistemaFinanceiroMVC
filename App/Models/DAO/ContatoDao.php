<?php

namespace App\Models\DAO;

use App\Models\Entidades\Contato;

class ContatoDao extends BaseDAO
{

    public function listar()
    {

        $resultado = $this->select("SELECT con_id, con.uso_id, con_msg, con_titulo, con_lida, uso_nome FROM contatos as con INNER JOIN usuario as uso on uso.uso_id = con.uso_id");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Contato::class);
    }

    public function salvar(Contato $contato)
    {
        try {

            $uso_id = $contato->__get("uso_id");
            $con_msg = $contato->__get("con_msg");
            $con_titulo = $contato->__get("con_titulo");

            return $this->insert(
                'contatos',
                ":uso_id, :con_msg, :con_titulo",
                [
                    ':uso_id'       => $uso_id,
                    ':con_msg'      => $con_msg,
                    ':con_titulo'   => $con_titulo,
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
        }
    }

    public function lida(Contato $contato)
    {
        try {
            $con_id = $contato->__get("con_id");
            $con_lida = $contato->__get("con_lida");

            return $this->update(
                'contatos',
                "con_lida = :con_lida",
                [
                    ':con_id'       => $con_id,
                    ':con_lida'     => $con_lida,
                ],
                "con_id = :con_id"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }

    public function excluir(int $id)
    {
        try {

            return $this->delete('contatos', "con_id = $id");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o contato. " . $e->getMessage(), 500);
        }
    }
}
