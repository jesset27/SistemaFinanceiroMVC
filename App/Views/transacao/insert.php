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
        <?php } ?>
        <div class="col-md-6 mb-3">
            <?php if ($viewVar['tipo_id'] == '1') { ?>
                <img src="http://<?php echo APP_HOST; ?>/public/img/despesa.png" class="img-fluid" alt="image">
            <?php } else { ?>
                <img src="http://<?php echo APP_HOST; ?>/public/img/receita.png" class="img-fluid" alt="image">
            <?php } ?>
        </div>
        <div class="col-md-6">
            <h2 class="signin-text mb-3"><?php echo $viewVar['nomeTransacao'] ?></h2>
            <p>Cadastro de <?php echo $viewVar['nomeTransacao'] ?></p>
            <br />
            <div class="table-responsive">
                <form action="http://<?php echo APP_HOST; ?>/transacao/salvar" method="post" id="form_cadastro" enctype="multipart/form-data">
                    <input type="hidden" name="tipo_id" id="tipo_id" value="<?php echo $viewVar['tipo_id']; ?>">
                    <div class="form-group">
                        <label for="tran_data">Data Transação</label>
                        <input type="date" name="tran_data" id="tran_data" class="form-control" value="<?php echo $Sessao::retornaValorFormulario('tran_data'); ?>" required><br>
                    </div>
                    <div class="form-group">
                        <label for="tran_valor">Valor Transação</label>
                        <input type="number" name="tran_valor" id="tran_valor" class="form-control" value="<?php echo $Sessao::retornaValorFormulario('tran_valor'); ?>" required><br>
                    </div>
                    <div class="form-group">
                        <label for="tran_descricao">Descrição</label>
                        <input type="text" name="tran_descricao" id="tran_descricao" class="form-control" value="<?php echo $Sessao::retornaValorFormulario('tran_descricao'); ?>" required><br>
                    </div>
                    </br>
                    <div class="form-group">
                        <input type="submit" name="enviar" value="Inserir" class="btn btn-primary w100">
                        <a href="http://<?php echo APP_HOST; ?>/login/dashboard" class="btn btn-secondary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Cancelar </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>