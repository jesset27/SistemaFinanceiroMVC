<link href="http://<?php echo APP_HOST; ?>/public/css/style-dashboard.css" rel="stylesheet">



<div class="container" style="margin-left:200px">
    <div class="row content">
        <?php if ($Sessao::retornaMensagem()) { ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?= $Sessao::retornaMensagem() ?>
                <br>
            </div>
        <?php } ?>
        <?php if ($Sessao::retornaErro()) { ?>
            <div class="alert alert-warning" role="alert">
                <a href="" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <?php foreach ($Sessao::retornaErro() as $key => $mensagem) {
                    echo $mensagem . "<br />";
                } ?>
            </div>
        <?php } else {
            $Sessao::limpaFormulario();
        } ?>
        <div class="col-md-6 mb-3">
            <img src="http://<?php echo APP_HOST; ?>/public/img/alterar.png" class="img-fluid" alt="image">
        </div>
        <div class="col-md-6">
            <h1 class="signin-text mb-3"> Resetar senha</h1>
            <p>Por favor, entre com os dados para alterar a sua senha.</p>
            <hr />
            <br />

            <div class="table-responsive">
                <form action="http://<?php echo APP_HOST; ?>/usuario/resetPassword" method="post" id="form_cadastro">
                    <form action="http://<?php echo APP_HOST; ?>/usuario/resetPassword" method="post" id="form_cadastro">
                        <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $viewVar['usuario']->__get("uso_id"); ?>">
                        <div class="form-group">
                            <label for="nome">Usuário:</label>
                            <input type="text" class="form-control" name="nome" value="<?php echo $viewVar['usuario']->__get("uso_nome"); ?>" readonly>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="email">E-mail*</label>
                            <input type="email" class="form-control" name="email" placeholder="Seu e-mail" value="<?php echo $viewVar['usuario']->__get("uso_email"); ?>" required>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="senha">Nova Senha:</label>
                            <input type="password" class="form-control" name="senha" placeholder="Sua nova senha" value="" required>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="senha_confirme">Confirmação da Nova Senha:</label>
                            <input type="password" class="form-control" name="senha_confirme" placeholder="Confirmação da senha" value="" required>
                        </div>
                        <br />
                        <div class="form-group">
                        <br />
                            <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar </button>
                            <a href="http://<?php echo APP_HOST; ?>/login/dashboard" class="btn btn-secondary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Cancelar </a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
