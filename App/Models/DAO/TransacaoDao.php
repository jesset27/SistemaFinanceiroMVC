<?php 
require "../Entidades/Transacao.php";
class TransacaoDao {
    private $conexao;

    public function __construct($conexao) {
        $this->conexao = $conexao;
    }

    public function inserir(Transacao $transacao) {
        $sql = "INSERT INTO transacao (tipo_id, uso_id, tran_data, tran_valor, tran_descricao) VALUES (?, ?, ?, ?, ?)";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $transacao->getTipoId());
        $stmt->bindParam(2, $transacao->getUsoId());
        $stmt->bindParam(3, $transacao->getTranData());
        $stmt->bindParam(4, $transacao->getTranValor());
        $stmt->bindParam(5, $transacao->getTranDescricao());
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function alterar(Transacao $transacao) {
        $sql = "UPDATE transacao SET tipo_id = ?, uso_id = ?, tran_data = ?, tran_valor = ?, tran_descricao = ? WHERE tran_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $transacao->getTipoId());
        $stmt->bindParam(2, $transacao->getUsoId());
        $stmt->bindParam(3, $transacao->getTranData());
        $stmt->bindParam(4, $transacao->getTranValor());
        $stmt->bindParam(5, $transacao->getTranDescricao());
        $stmt->bindParam(6, $transacao->getTranId());
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function remover($id) {
        $sql = "DELETE FROM transacao WHERE tran_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function buscarPorId($id) {
        $sql = "SELECT * FROM transacao WHERE tran_id = ?";
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindParam(1, $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function listar() {
        $transacoes = array();
        $sql = "SELECT * FROM transacao";
        $stmt = $this->conexao->query($sql);

        while ($transacao_array = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $transacao = new Transacao($transacao_array['tran_data'], $transacao_array['tran_valor'], $transacao_array['tran_descricao']);
            $transacao->setTranId($transacao_array['tran_id']);
            $transacao->setTipoId($transacao_array['tipo_id']);
            $transacao->setUsoId($transacao_array['uso_id']);
            array_push($transacoes, $transacao);
        }

        return $transacoes;
    }
}
