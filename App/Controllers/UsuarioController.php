<?php 

namespace App\Controllers;

use App\Lib\Sessao;
use App\Models\DAO\UsuarioDAO;
use App\Models\Entidades\Usuario;
use App\Models\Validacao\UsuarioValidador;
use App\Enums\EnumTipoUsuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $this->auth();

        $usuarioDAO = new UsuarioDAO();

        self::setViewParam('listaUsuarios', $usuarioDAO->listar());

        $this->render('/usuario/index');

        Sessao::limpaMensagem();
    }

    public function cadastro()
    {
        $this->auth();

        $this->render('/usuario/cadastro');

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function salvar()
    {
        $this->auth();

        $usuario = new Usuario();
        $usuario->__set("uso_nome", $_POST['nome']);
        $usuario->__set("uso_email", $_POST['email']);
        $usuario->__set("uso_senha", $_POST['senha']);
        $usuario->__set("tusid", EnumTipoUsuario::COMUM->value);
        $senha_confirme = $_POST['senha_confirme'];

        Sessao::gravaFormulario($_POST);

        $usuarioValidador = new UsuarioValidador();
        $resultadoValidacao = $usuarioValidador->validar($usuario);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/usuario/cadastro');
        }

        $erros = [];
        $usuarioDAO = new UsuarioDAO();

        if($usuarioDAO->verificaEmail($usuario->__get("uso_email"))) {
            $erros[] = "Email existente!";
        }

        if($usuarioDAO->verificaUsuario($usuario->__get("uso_nome"))) {
            $erros[] = "Nome de usuário já cadastrado!";
        }

        if(empty($usuario->__get("uso_senha")) || empty($senha_confirme)) {
            $erros[] = "Senha ou confirmação de senha não digitada!";
        }

        if(trim($usuario->__get("uso_senha")) != trim($senha_confirme)) {
            $erros[] = "As senhas digitadas não coincidem!";
        }

        if ($erros) {
            Sessao::gravaErro($erros);
            $this->redirect('/usuario/cadastro');
        }

        $usuario->__set("uso_senha", password_hash($usuario->__get("uso_senha"), PASSWORD_DEFAULT));

        try {

            $usuarioDAO->salvar($usuario);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/usuario');
        }
 
        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Usuário adicionado com sucesso!");

        $this->redirect('/usuario');
    }
    
    public function edicao($params)
    {
        $this->auth();

        $id = $params[0];

        $usuarioDAO = new UsuarioDAO();

        $usuario = $usuarioDAO->getById($id);

        if(!$usuario){
            Sessao::gravaMensagem("Usuário inexistente");
            $this->redirect('/usuario');
        }

        self::setViewParam('usuario', $usuario);

        $this->render('/usuario/editar');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function atualizar()
    {
        $this->auth();

        $usuario = new Usuario();
        $usuario->__set("uso_id", $_POST['id']);
        $usuario->__set("uso_nome", $_POST['nome']);
        $usuario->__set("uso_email", $_POST['email']);
        $usuario->__set("uso_senha", $_POST['senha']);
        $usuario->__set("tus_id", EnumTipoUsuario::COMUM->value);

        Sessao::gravaFormulario($_POST);

        $usuarioValidador = new UsuarioValidador();
        $resultadoValidacao = $usuarioValidador->validar($usuario);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/usuario/edicao/' . $usuario->__get("uso_id"));
        }

        $erros = [];
        $usuarioDAO = new UsuarioDAO();

        $resultado  = $usuarioDAO->verificaEmail($usuario->__get("uso_email"));

        if($resultado && $resultado['id'] != $usuario->__get("uso_id")) {
            $erros[] = "O email '{$usuario->__get("uso_email")}' já está sendo utilizado!";
        }

        $resultado  = $usuarioDAO->verificaUsuario($usuario->__get("uso_nome"));

        if($resultado && $resultado['id'] != $usuario->__get("uso_id")) {
            $erros[] = "O nome de usuário '{$usuario->__get("uso_nome")}' já esta sendo utilizado!";
        }

        if ($erros) {
            Sessao::gravaErro($erros);
            $this->redirect('/usuario/edicao/' . $usuario->__get("uso_id"));
        }

        try{
            
            $usuarioDAO->atualizar($usuario);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/usuario');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Usuário atualizado com sucesso!");

        $this->redirect('/usuario');
    }

    public function exclusao($params)
    {
        $this->auth();

        $id = $params[0];

        $usuarioDAO = new UsuarioDAO();
        $usuario = $usuarioDAO->getById($id);

        if(!$usuario){
            Sessao::gravaMensagem("Usuario (uso_id:{$id}) inexistente.");
            $this->redirect('/usuario');
        }

        self::setViewParam('usuario',$usuario);

        $this->render('/usuario/exclusao');

        Sessao::limpaMensagem();
        Sessao::limpaErro();
    }

    public function registrar()
    {
        print_r($_POST);
        $usuario = new Usuario();
        $usuario->__set("uso_nome", $_POST['nome']);
        $usuario->__set("uso_email", $_POST['email']);
        $usuario->__set("uso_senha", $_POST['senha']);
        $usuario->__set("tus_id", EnumTipoUsuario::COMUM->value);
        $senha_confirme = $_POST['senha_confirme'];

        Sessao::gravaFormulario($_POST);

        $usuarioValidador = new UsuarioValidador();
        $resultadoValidacao = $usuarioValidador->validar($usuario);

        if($resultadoValidacao->getErros()){
            Sessao::gravaErro($resultadoValidacao->getErros());
            $this->redirect('/login/cadastro'); 
        }

        $erros = [];
        $usuarioDAO = new UsuarioDAO();

        if($usuarioDAO->verificaEmail($usuario->__get("uso_email"))) {
            $erros[] = "Email existente!";
        }

        if($usuarioDAO->verificaUsuario($usuario->__get("uso_nome"))) {
            $erros[] = "Nome de usuário já cadastrado!";
        }

        if(empty($usuario->__get("uso_senha")) || empty($senha_confirme)) {
            $erros[] = "Senha ou confirmação de senha não digitada!";
        }

        if(strcmp(trim($usuario->__get("uso_senha")), trim($senha_confirme)) != 0) {
            $erros[] = "As senhas digitadas não coincidem!";
        }

        if ($erros) {
            Sessao::gravaErro($erros);
            $this->redirect('/login/cadastro');
        }

        $usuario->__set("uso_senha", password_hash($usuario->__get("uso_senha"), PASSWORD_DEFAULT));

        try {

            $usuarioDAO->salvar($usuario);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/login');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Usuário registrado com sucesso!");

        $this->redirect('/login');
    }

    public function resetPassword()
    {
        $this->auth();

        $usuario = new Usuario();
        $usuario->__set("uso_id", $_POST['id']);
        $password = $_POST['senha'];
        $senha_confirme = $_POST['senha_confirme'];

        Sessao::gravaFormulario($_POST);

        $erros = [];
        $usuarioDAO = new UsuarioDAO();

        if ($password !== $senha_confirme) {
            $erros[] = "As senhas digitadas não coincidem!";
        }

        if ($erros) {
            Sessao::gravaErro($erros);
            $this->redirect('/login/reset' . $usuario->__get("uso_id"));
        }

        try{

            $usuario->__set("uso_senha", password_hash($password, PASSWORD_DEFAULT));
            $usuarioDAO->atualizarPassword($usuario);

        } catch (\Exception $e) {
            Sessao::gravaMensagem($e->getMessage());
            $this->redirect('/login/dashboard');
        }

        Sessao::limpaFormulario();
        Sessao::limpaMensagem();
        Sessao::limpaErro();

        Sessao::gravaMensagem("Usuário atualizado com sucesso!");

        $this->redirect('/login/dashboard');
    }
}