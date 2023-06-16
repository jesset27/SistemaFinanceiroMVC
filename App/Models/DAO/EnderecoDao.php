<?php

namespace App\Models\DAO;

use App\Models\DAO\BaseDAO;
use App\Models\Entidades\Endereco;

class EnderecoDAO extends BaseDAO
{
    public function getById($id)
    {
        $resultado = $this->select("SELECT * FROM endereco WHERE uso_id = $id");

        return $resultado->fetchObject(Endereco::class);
    }

    public function salvar(Endereco $endereco)
    {
        try {
            $uso_id = $endereco->__get("uso_id");
            $end_num = $endereco->__get("end_num");
            $end_bairro = $endereco->__get("end_bairro");
            $end_logradouro = $endereco->__get("end_logradouro");
            $end_cep = $endereco->__get("end_cep");
            $end_cidade = $endereco->__get("end_cidade");
            $end_uf = $endereco->__get("end_uf");

            return $this->insert(
                'endereco',
                ":uso_id, :end_num, :end_bairro, :end_logradouro, :end_cep, :end_cidade, :end_uf",
                [
                    ':uso_id'           => $uso_id,
                    ':end_num'          => $end_num,
                    ':end_bairro'       => $end_bairro,
                    ':end_logradouro'   => $end_logradouro,
                    ':end_cep'          => $end_cep,
                    ':end_cidade'       => $end_cidade,
                    ':end_uf'           => $end_uf
                ]
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na gravação dos dados. " . $e->getMessage(), 500);
        }
    }

    public function atualizar(Endereco $endereco)
    {
        try {
            $uso_id = $endereco->__get("uso_id");
            $end_num = $endereco->__get("end_num");
            $end_bairro = $endereco->__get("end_bairro");
            $end_logradouro = $endereco->__get("end_logradouro");
            $end_cep = $endereco->__get("end_cep");
            $end_cidade = $endereco->__get("end_cidade");
            $end_uf = $endereco->__get("end_uf");

            return $this->update(
                'endereco',
                " 
                end_num = :end_num,
                end_bairro = :end_bairro, 
                end_logradouro = :end_logradouro,
                end_cep = :end_cep,
                end_cidade = :end_cidade,
                end_uf = :end_uf",
                [
                    ':uso_id'           => $uso_id,
                    ':end_num'          => $end_num,
                    ':end_bairro'       => $end_bairro,
                    ':end_logradouro'   => $end_logradouro,
                    ':end_cep'          => $end_cep,
                    ':end_cidade'       => $end_cidade,
                    ':end_uf'           => $end_uf
                ],
                "uso_id = :uso_id"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }
}
