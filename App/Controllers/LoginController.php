<?php

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UsuarioDAO;
use App\Models\DAO\TransacaoDAO;
use App\Models\Entidades\Usuario;
use App\Models\Validacao\UsuarioValidador;
use App\Enums\EnumTipoUsuario;
use App\Enums\EnumTipoTransacao;
class LoginController extends Controller
{
    public function index()
    {
        $this->render('login/index'); 

        Sessao::limpaMensagem();
    }

    public function autentica() 
    {
        $uso_nome = $_POST['nome'];
        $uso_senha = $_POST['senha'];

        Sessao::gravaFormulario($_POST);

        if(empty(trim($uso_nome)) && empty(trim($uso_senha))){
            $erro[] = "Faltou digitar usuário e/ou senha!";
            Sessao::gravaErro($erro);
            $this->redirect('/login');
        }

        $usuarioDAO = new UsuarioDAO();
        $uso_id = $usuarioDAO->autenticar($uso_nome, $uso_senha);

        if ($uso_id == 0) {
            $erro[] = "Usuário ou senha incorretos. Tente novamente!";
            Sessao::gravaErro($erro);
            $this->redirect('/login');
        }
       
        $usuario = $usuarioDAO->getById($uso_id);
        Sessao::gravarTipoUsuario($usuario->__get('tus_id'));
        Sessao::gravaLogin($uso_id, $uso_nome);

        Sessao::limpaFormulario();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Usuário logado com sucesso!");

        $this->redirect('/login/dashboard');

        Sessao::limpaMensagem();
    }

    public function register()
    {   
        $this->render('login/cadastro');

        Sessao::limpaErro();
        Sessao::limpaMensagem();
    }

    public function registrar()
    {
        $usuario = new Usuario();

        $usuario->__set("uso_nome", $_POST['nome']);
        $usuario->__set("uso_email", $_POST['email']);
        $usuario->__set("uso_senha", $_POST['senha']);
        $usuario->__set("tusid", EnumTipoUsuario::COMUM->value);

        Sessao::gravaFormulario($_POST);

        $usuarioValidador = new UsuarioValidador();
        $resultadoValidacao = $usuarioValidador->validar($usuario);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/login/cadastro');
        }

        $usuarioDAO = new UsuarioDAO();

        if($usuarioDAO->verificaEmail($usuario->__get("uso_email"))) {
            $erro[] = "Email Existente!";
            Sessao::gravaErro($erro);
            $this->redirect('/login/cadastro');
        }

        try {

            $usuarioDAO->salvar($usuario);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/login');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Usuário adicionado com sucesso!");

        $this->redirect('/login');
    }

    
    public function dashboard()
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
        $despesa = $transacaoDAO->listarTransacao(EnumTipoTransacao::DESPESA->value, $uso_id,  $data[0], $data[1]);
        $receita = $transacaoDAO->listarTransacao(EnumTipoTransacao::RECEITA->value, $uso_id,  $data[0], $data[1]);

        
        $total_despesa = 0;
        foreach ($despesa as $despesa) {
            $total_despesa = $total_despesa + $despesa->__get("tran_valor");
        }


        $total_receita = 0;
        foreach ($receita as $receita) {
            $total_receita = $total_receita + $receita->__get("tran_valor");
        }

        $saldo_atual = $total_receita - $total_despesa;
        $this->setViewParam('saldo_atual', $saldo_atual);
        $this->setViewParam('total_despesa', $total_despesa);   
        $this->setViewParam('total_receita', $total_receita);

        $this->setViewParam('dataCompleta', $dataCompleta);
        $this->render('login/dashboard');
    }

    public function reset()
    {
        $uso_id = $_SESSION['uso_id'];

        $usuarioDAO = new UsuarioDAO();

        $usuario = $usuarioDAO->getById($uso_id);

        if(!$usuario){
            Sessao::gravaMensagem("Usuário inexistente");
            $this->redirect('/login/dashboard');
        }

        self::setViewParam('usuario', $usuario);

        $this->render('login/reset-password');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function logout() 
    {
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        $_SESSION["loggedin"] = false;
        unset($_SESSION['uso_nome']);

        $this->redirect('/home');
    }
}