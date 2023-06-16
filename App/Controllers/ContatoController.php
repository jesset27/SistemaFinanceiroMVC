<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\ContatoDao;
use App\Models\Entidades\Contato;
use App\Models\Validacao\ContatoValidador;
use App\Enums\EnumTipoUsuario;

class ContatoController extends Controller
{
    public function index()
    {
        $this->auth();

        if (Sessao::retornaTipoUsuario() == EnumTipoUsuario::COMUM->value)
            $this->redirect('/contato/cadastro');

        $contatoDAO = new ContatoDAO();

        $this->setViewParam('listaContatos', $contatoDAO->listar());
        $this->setViewParam('edicao', 'edicao');
        
        $this->render('/contato/listarMens');
        
        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->auth();

        $this->setViewParam('uso_id', $_SESSION['uso_id']);

        $this->render('/contato/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $this->auth();
        $contato = new Contato();
        $contato->__set("uso_id", $_POST['uso_id']);
        $contato->__set("con_msg", $_POST['msg']);
        $contato->__set("con_titulo", $_POST['titulo']);

        Sessao::gravaFormulario($_POST);

        $contatoValidador = new ContatoValidador();
        $resultadoValidacao = $contatoValidador->validar($contato);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/contato/cadastro');
        }

        $contatoDAO = new ContatoDAO();

        try {
            $contatoDAO->salvar($contato);
        } catch (\Exception $e) {
            Sessao::gravaMensagem("Erro ao gravar");
            $this->redirect('/contato/cadastro');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Mensagem enviada com sucesso!");

        $this->redirect('/contato');
    }

    public function edicao($params)
    {
        $this->auth();

        $id = $params[0];

        $contatoDAO = new ContatoDAO();

        $contato = $contatoDAO->getById($id);

        if(!$contato){
            Sessao::gravaMensagem("Contato inexistente.");
            $this->redirect('/contato');
        }

        self::setViewParam('contato',$contato);

        $this->render('contato/editar');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function atualizar()
    {
        $this->auth();

        $contato = new Contato();

        $contato->__set("con_id", $_POST['con_id']);
        $contato->__set("con_msg", $_POST['msg']);

        Sessao::gravaFormulario($_POST);

        $contatoValidador = new ContatoValidador();
        $resultadoValidacao = $contatoValidador->validar($contato);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/contato/edicao/'.$_POST['id']);
        }

        $contatoDAO = new ContatoDAO();

        try {
            $contatoDAO->atualizar($contato);
        } catch (\Exception $e) {
            Sessao::gravaMensagem("Erro ao gravar");
            $this->redirect('/contato');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Mensagem atualizada com sucesso!");

        $this->redirect('/contato');

    }

    public function excluir()
    {
        $this->auth();

        $contato = new Contato();
        $contato->__set("con_id", $_GET['con_id']);

        $contatoDAO = new ContatoDAO();

        if(!$contatoDAO->excluir($contato->__get("con_id"))){
            Sessao::gravaMensagem("Contato inexistente.");
            $this->redirect('/contato');
        }

        Sessao::gravaMensagem("Contato excluído com sucesso!");

        $this->redirect('/contato');
    }

    public function lida($params)
    {
        $this->auth();
        $id = $params[0];
        $contato = new Contato();
        $contato->__set("con_id", $id);
        $contato->__set("con_lida", 1);

        $contatoDAO = new ContatoDAO();

        if(!$contatoDAO->lida($contato)){
            Sessao::gravaMensagem("Não foi possível marca mensagem como lida.");
            $this->redirect('/contato');
        }

        Sessao::gravaMensagem("Mensagem lida com sucesso!");

        $this->redirect('/contato');
    }
}