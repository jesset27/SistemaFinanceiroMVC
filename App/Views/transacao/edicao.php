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
            <?php if ($viewVar['transacao']->__get('tipo_id') == '1') { ?>
                <img src="http://<?php echo APP_HOST; ?>/public/img/despesa.png" class="img-fluid" alt="image">
            <?php } else { ?>
                <img src="http://<?php echo APP_HOST; ?>/public/img/receita.png" class="img-fluid" alt="image">
            <?php } ?>
        </div>
        <div class="col-md-6">
            <h2 class="signin-text mb-3"> Alterar <?php echo $viewVar['nomeTransacao'] ?></h2>
            <p>Por favor, preencha os campos para serem alterados</p>
            <br />
            <div class="table-responsive">
                <form action="http://<?php echo APP_HOST; ?>/transacao/atualizar" method="post">
                    <input type="hidden" name="tran_id" value="<?php echo $viewVar['transacao']->__get('tran_id'); ?>">
                    <input type="hidden" name="tipo_id" value="<?php echo $viewVar['transacao']->__get('tipo_id'); ?>">
                    <div class="form-group">
                        <label for="tran_data">Data</label>
                        <input type="date" name="tran_data" id="tran_data" class="form-control" value="<?php echo (new DateTime($viewVar['transacao']->__get('tran_data')))->format('Y-m-d'); ?>">
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="tran_valor">Valor</label>
                        <input type="number" name="tran_valor" id="tran_valor" class="form-control" value="<?php echo $viewVar['transacao']->__get('tran_valor'); ?>">
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="tran_descricao">Descrição</label>
                        <input type="text" name="tran_descricao" id="tran_descricao" class="form-control" value="<?php echo $viewVar['transacao']->__get('tran_descricao'); ?>">
                    </div>
                    </br>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="enviar" value="Alterar">
                        <a href="http://<?php echo APP_HOST; ?>/transacao/<?= $viewVar['nomeTransacao'] ?>s" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>