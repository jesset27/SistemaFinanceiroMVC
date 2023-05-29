<link href="http://<?php echo APP_HOST; ?>/public/css/style.css" rel="stylesheet">

<?php
$Sessao::limpaFormulario();
?>
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo"><img src="http://<?php echo APP_HOST; ?>/public/img/logoBranca3.png" alt=""></label>
    <ul>
        <li><a href="http://<?php echo APP_HOST; ?>/home/index">Sair</a></li>
    </ul>
</nav>
<div class="container">
    <div class="row content">
        <div class="col-md-6 mb-3">
            <img src="http://<?php echo APP_HOST; ?>/public/img/imgRegister2.png" class="img-fluid" alt="image">
        </div>
        <div class="col-md-6">
            <h2 class="signin-text mb-3"> Criar Conta</h2>
            <p>Por favor, preencha os campos do formulário para criar a sua conta</p>
            <div>
                <div class="table-responsive">
                    <form action="http://<?php echo APP_HOST; ?>/usuario/registrar" method="post" id="form_cadastro">
                        <div class="form-group">
                            <label for="nome">Usuário*</label>
                            <input type="text" class="form-control" name="nome" placeholder="Seu nome" value="<?php echo $Sessao::retornaValorFormulario('nome'); ?>">
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="email">E-mail*</label>
                            <input type="email" class="form-control" name="email" placeholder="Seu e-mail" value="<?php echo $Sessao::retornaValorFormulario('email'); ?>" required>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="senha">Senha*:</label>
                            <input type="password" class="form-control" name="senha" placeholder="Sua senha" value="<?php echo $Sessao::retornaValorFormulario('senha'); ?>" required>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="senha_confirme">Confirmação da Senha:</label>
                            <input type="password" class="form-control" name="senha_confirme" placeholder="Confirmação da senha" value="<?php echo $Sessao::retornaValorFormulario('senha_confirme'); ?>" required>
                        </div>
                        </br></br>
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary" value="Enviar">
                            <input type="reset" class="btn btn-secondary" value="Limpar">
                        </div>
                        </br>
                        <p>Possui uma conta? <a href="http://<?php echo APP_HOST; ?>/login">Fazer login</a></p>
                    </form>
                </div>
            </div>
            <div class="col-md-6"></div>
        </div>
    </div>
</div>