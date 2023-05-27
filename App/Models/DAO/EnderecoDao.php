<?php

use App\Models\DAO\BaseDAO;
use APP\Models\Entidades\Endereco;

class EnderecoDAO extends BaseDAO
{
    public function getById($id)
    {
        $resultado = $this->select("SELECT * FROM endereco WHERE id = $id");

        return $resultado->fetchObject(Endereco::class);
    }

    public function listar()
    {
        $resultado = $this->select("SELECT * FROM endereco");

        return $resultado->fetchAll(\PDO::FETCH_CLASS, Endereco::class);
    }

    public function salvar(Endereco $endereco)
    {
        try {
            $uso_id = $endereco->getUsoId();
            $end_num = $endereco->getEndNum();
            $end_bairro = $endereco->getEndBairro();
            $end_logradouro = $endereco->getEndLogradouro();
            $end_cep = $endereco->getEndCep();
            $end_cidade = $endereco->getEndCidade();
            $end_uf = $endereco->getEndUf();

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

            $uso_id = $endereco->getUsoId();
            $end_num = $endereco->getEndNum();
            $end_bairro = $endereco->getEndBairro();
            $end_lougradouro = $endereco->getEndLogradouro();
            $end_cep = $endereco->getEndCep();
            $end_cidade = $endereco->getEndCidade();
            $end_uf = $endereco->getEndUf();

            return $this->update(
                'usuario',
                "uso_id = :uso_id, 
                end_num = :end_num, 
                end_logradouro = :end_logradouro,
                end_cep = :end_cep
                end_cidade = :end_cidade
                end_uf = :end_uf",
                [
                    ':uso_id'           => $uso_id,
                    ':end_num'          => $end_num,
                    ':end_bairro'       => $end_bairro,
                    ':end_logradouro'   => $end_lougradouro,
                    ':end_cep'          => $end_cep,
                    ':end_cidade'       => $end_cidade,
                    ':end_uf'           => $end_uf
                ],
                "id = :id"
            );
        } catch (\Exception $e) {
            throw new \Exception("Erro na atualização dos dados. " . $e->getMessage(), 500);
        }
    }

    public function excluir(int $id)
    {
        try {

            return $this->delete('usuario', "id = $id");
        } catch (\Exception $e) {
            throw new \Exception("Erro ao excluir o usuario. " . $e->getMessage(), 500);
        }
    }
}
