<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\EnderecoDAO;
use App\Models\Entidades\Endereco;
use App\Models\Validacao\EnderecoValidador;


class EnderecoController extends Controller
{
    public function cadastro()
    {
        $this->auth();

        $endereco = new Endereco();
        $endereco->__set("uso_id", $_SESSION['uso_id']);

        $enderecoDAO = new EnderecoDAO();

        $checaEndereco = $enderecoDAO->getById($endereco->__get('uso_id'));

        if ($checaEndereco) {
            Sessao::gravaMensagem("Endereço já cadastrado!");
            $this->redirect('/login/dashboard');
        }

        self::setViewParam('formAction', 'salvar');
        self::setViewParam('endereco', $endereco);

        $this->render('/endereco/form');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $this->auth();

        $endereco = new Endereco();
        $endereco->__set("uso_id", $_POST['uso_id']);
        $endereco->__set("end_num", $_POST['numero']);
        $endereco->__set("end_bairro", $_POST['bairro']);
        $endereco->__set("end_logradouro", $_POST['logradouro']);
        $endereco->__set("end_cep", $_POST['cep']);
        $endereco->__set("end_cidade", $_POST['cidade']);
        $endereco->__set("end_uf", $_POST['estado']);

        Sessao::gravaFormulario($_POST);

        $enderecoValidador = new EnderecoValidador();
        $resultadoValidacao = $enderecoValidador->validar($endereco);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/endereco/cadastro');
        }

        $enderecoDAO = new EnderecoDAO();

        try {
            $enderecoDAO->salvar($endereco);
        } catch (\Exception $e) {
            Sessao::gravaErro(array($e->getMessage()));
            $this->redirect('/endereco/cadastro');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::gravaMensagem("Endereço cadastrado com sucesso!");

        $this->redirect('/login/dashboard');
    }

    public function edicao($params)
    {
        $this->auth();

        $id = $params[0];

        $enderecoDAO = new EnderecoDAO();

        $endereco = $enderecoDAO->getById($id);

        if (!$endereco) {
            Sessao::gravaMensagem("Endereço inexistente para edição! Cadastre um endereço primeiro.");
            $this->redirect('/endereco/cadastro');
        }

        self::setViewParam('formAction', 'atualizar');
        self::setViewParam('endereco', $endereco);

        $this->render('/endereco/form');

        Sessao::limpaMensagem();
    }

    public function atualizar()
    {
        $this->auth();

        $endereco = new Endereco();
        $endereco->__set("uso_id", $_POST['uso_id']);
        $endereco->__set("end_num", $_POST['numero']);
        $endereco->__set("end_bairro", $_POST['bairro']);
        $endereco->__set("end_logradouro", $_POST['logradouro']);
        $endereco->__set("end_cep", $_POST['cep']);
        $endereco->__set("end_cidade", $_POST['cidade']);
        $endereco->__set("end_uf", $_POST['estado']);

        Sessao::gravaFormulario($_POST);

        $enderecoValidador = new EnderecoValidador();
        $resultadoValidacao = $enderecoValidador->validar($endereco);

        if ($resultadoValidacao->getErros()) {
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/endereco/edicao/' . $_POST['uso_id']);
        }

        $enderecoDAO = new EnderecoDAO();

        try {
            $enderecoDAO->atualizar($endereco);
        } catch (\Exception $e) {
            Sessao::gravaErro(array($e->getMessage()));
            $this->redirect('/endereco/edicao/' . $_POST['uso_id']);
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::gravaMensagem("Endereço cadastrado com sucesso!");

        $this->redirect('/login/dashboard');
    }
}
