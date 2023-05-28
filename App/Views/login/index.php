<link href="http://<?php echo APP_HOST; ?>/public/css/style.css" rel="stylesheet">

<nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo"><img src="http://<?php echo APP_HOST; ?>/public/img/logoBranca3.png" alt=""></label>
        <ul>
            <li><a href="http://<?php echo APP_HOST; ?>/home/index.php">Sair</a></li>
        </ul>
    </nav>
    <div class="container">
        <div class="row content">
        <?php if ($Sessao::retornaMensagem()) { ?>
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        <?= $Sessao::retornaMensagem() ?>
                    </div>
                    <br />
                </div>
            <?php } ?>
            <div class="col-md-6 mb-3">
                <img src="http://<?php echo APP_HOST; ?>/public/img/LogoNuAzulMaior.png" class="img-fluid" alt="image">
            </div>
            <div class="col-md-6">
                <h3 class="signin-text mb-3" style="padding: 5px;"> Login </h3>
                <br>
                <form action="http://<?php echo APP_HOST; ?>/login/autentica" method="post" id="form_cadastro">
                    <div>
                        <label for="nome">Usuário</label>
                        <input type="text" class="form-control" name="nome" id="nome" value="" required>
                    </div>
                    <br></br>
                    <div>
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" class="form-control" id="senha" required>
                    </div>
                    <br></br>
                    <button class="btn btn-class">Entrar</button>
                    <br></br>
                    <br></br>
                    <p>Não possui uma conta? <a href="http://<?php echo APP_HOST; ?>/login/register">Criar conta</a></p>
                </form>
            </div>
        </div>
    </div>
