<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UsuarioDAO;
use App\Models\DAO\TransacaoDAO;
use App\Models\Entidades\Usuario;
use App\Models\Entidades\Transacao;
use App\Models\Validacao\TransacaoValidador;
use App\Enums\EnumTipoUsuario;
use App\Enums\EnumTipoTransacao;
class TransacaoController extends Controller
{
    public function receitas()
    {
        $this->auth();
        $uso_id = $_SESSION['uso_id'];
        $dataCompleta = date("Y-m");
        $data = [date("Y"), date("m")];
        if (isset($_POST['mes_ano'])) {
            $dataCompleta  = $_POST['mes_ano'];
            $data = explode('-', $_POST['mes_ano']);
        }
        $transacaoDAO = new TransacaoDAO();
        $receitas = $transacaoDAO->listarTransacao(EnumTipoTransacao::RECEITA->value, $uso_id,  $data[0], $data[1]);

        $this->setViewParam('listaTransacao', $receitas);
        $this->setViewParam('dataCompleta', $dataCompleta);
        $this->setViewParam('nomeTransacao', 'Receitas');
        $this->setViewParam('insere', 'insertReceita');
        $this->setViewParam('editar', 'edit_receita');
        
        $this->render('transacao/index'); 

        Sessao::limpaMensagem();
    }

    public function despesas()
    {
        $this->auth();
        $uso_id = $_SESSION['uso_id'];
        $dataCompleta = date("Y-m");
        $data = [date("Y"), date("m")];
        if (isset($_POST['mes_ano'])) {
            $dataCompleta  = $_POST['mes_ano'];
            $data = explode('-', $_POST['mes_ano']);
        }
        $transacaoDAO = new TransacaoDAO();

        $despesas = $transacaoDAO->listarTransacao(EnumTipoTransacao::DESPESA->value, $uso_id,  $data[0], $data[1]);

        $this->setViewParam('listaTransacao', $despesas);
        $this->setViewParam('dataCompleta', $dataCompleta);

        $this->setViewParam('nomeTransacao', 'Despesas');
        $this->setViewParam('insere', 'insertDespesa');
        $this->setViewParam('editar', 'edit_despesa');

        $this->render('transacao/index'); 

        Sessao::limpaMensagem();
    }

    public function insertDespesa(){

        $this->auth();
        $this->setViewParam('nomeTransacao', 'Despesa');
        $this->setViewParam('tipo_id', EnumTipoTransacao::DESPESA->value);
        $this->render('transacao/insert'); 

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

    }
    public function insertReceita()
    {
        $this->auth();
        $this->setViewParam('nomeTransacao', 'Receita');
        $this->setViewParam('tipo_id', EnumTipoTransacao::RECEITA->value);
        $this->render('transacao/insert'); 

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }
    public function salvar()
    {
        $this->auth();

       
        
        $transacao = new Transacao();
        $transacao->__set("uso_id", $_SESSION['uso_id']);
        $transacao->__set("tipo_id", $_POST['tipo_id']);
        $transacao->__set("tran_data", $_POST['tran_data']);
        $transacao->__set("tran_valor", $_POST['tran_valor']);
        $transacao->__set("tran_descricao", $_POST['tran_descricao']);

        Sessao::gravaFormulario($_POST);
        $transacaoNome = $transacao->__get("tipo_id") == EnumTipoTransacao::DESPESA->value ? 'despesa' : 'receita';
        $transacaoValidador = new TransacaoValidador();
        $resultadoValidacao = $transacaoValidador->validar($transacao);

        if ($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/transacao/insert'.$transacaoNome);
        }

        try {
            $transacaoDAO = new TransacaoDAO();
            $lasId = $transacaoDAO->salvar($transacao);
            $transacao->__set("tran_id", $lasId);
        } catch (\Exception $e) {
            Sessao::gravaErro($e->getMessage());
            $this->redirect('/transacao/insert'.$transacaoNome);
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Despesa adicionada com sucesso!");
        
        $this->redirect('/transacao/'.$transacaoNome.'s');
       
    }

    
    

}