<?php
class EnderecoDAO {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function inserir(Endereco $endereco) {
        $sql = "INSERT INTO endereco (uso_id, end_num, end_bairro, end_logradouro, end_cep, end_cidade, end_uf) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $endereco->getUsoId());
        $stmt->bindParam(2, $endereco->getEndNum());
        $stmt->bindParam(3, $endereco->getEndBairro());
        $stmt->bindParam(4, $endereco->getEndLogradouro());
        $stmt->bindParam(5, $endereco->getEndCep());
        $stmt->bindParam(6, $endereco->getEndCidade());
        $stmt->bindParam(7, $endereco->getEndUf());
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function alterar(Endereco $endereco) {
        $sql = "UPDATE endereco SET uso_id = ?, end_num = ?, end_bairro = ?, end_logradouro = ?, end_cep = ?, end_cidade = ?, end_uf = ? WHERE end_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $endereco->getUsoId());
        $stmt->bindParam(2, $endereco->getEndNum());
        $stmt->bindParam(3, $endereco->getEndBairro());
        $stmt->bindParam(4, $endereco->getEndLogradouro());
        $stmt->bindParam(5, $endereco->getEndCep());
        $stmt->bindParam(6, $endereco->getEndCidade());
        $stmt->bindParam(7, $endereco->getEndUf());
        $stmt->bindParam(8, $endereco->getEndId());
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function remover($id) {
        $sql = "DELETE FROM endereco WHERE end_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM endereco WHERE end_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listar() {
        $enderecos = array();
        $sql = "SELECT * FROM endereco";
        $stmt = $this->conexao->query($sql);

        while ($endereco_array = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $endereco = new Endereco();
            $endereco->setEndId($endereco_array['end_id']);
            $endereco->setUsoId($endereco_array['uso_id']);
            $endereco->setEndNum($endereco_array['end_num']);
            $endereco->setEndBairro($endereco_array['end_bairro']);
            $endereco->setEndLogradouro($endereco_array['end_logradouro']);
            $endereco->setEndCep($endereco_array['end_cep']);
            $endereco->setEndCidade($endereco_array['end_cidade']);
            $endereco->setEndUf($endereco_array['end_uf']);
            array_push($enderecos, $endereco);
        }

        return $enderecos;
    }
}