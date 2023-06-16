<link href="http://<?php echo APP_HOST; ?>/public/css/style-dashboard.css" rel="stylesheet">

<div class="container" style="margin-left:200px">
    <div class="row content">
        <div class="col-md-6 mb-3">
            <img src="http://<?php echo APP_HOST; ?>/public/img/contato.png" class="img-fluid" alt="image">
        </div>
        <div class="col-md-6">
            <h2 class="signin-text mb-3" style="margin-top:100px;">Escreva uma mensagem para o NuAzul</h2>
            <p>Por favor, preencha os campos para que a mensagem seja enviada</p>
            <div>
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
                <?php } ?>

                <form action="http://<?php echo APP_HOST; ?>/contato/salvar" method="post" id="form_cadastro">
                    <input type="hidden" class="form-control" name="uso_id" id="uso_id" value="<?php echo $viewVar['uso_id']; ?>">
                    <br />
                    <div class="mb-3">
                        <label for="titulo">Título</label>
                        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="" value="" required>
                    </div>
                    <br />
                    <div class="mb-3">
                        <label for="msg">Mensagem</label>
                        <textarea type="text" class="form-control" name="msg" rows="3" id="msg" placeholder="" value="" required> </textarea>
                    </div>
                    <br />
                    <button type="submit" class="btn btn-primary w100"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Enviar </button>
                    <a href="http://<?php echo APP_HOST; ?>/login/dashboard" class="btn btn-secondary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Cancelar </a>
                </form>
            </div>
            <div class=" col-md-3"></div>
        </div>
    </div>
</div>