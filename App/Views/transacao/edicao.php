<link href="http://<?php echo APP_HOST; ?>/public/css/style-dashboard.css" rel="stylesheet">
<body>
    <div class="container" style="margin-left:300px">
        <div class="row content">
        <?php if ($Sessao::retornaErro()) { ?>
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        <?= $Sessao::retornaErro() ?>
                    </div>
                    <br />
                </div>
            <?php } ?>
            <div class="col-md-6 mb-3">
            <?php if($viewVar['transacao']->__get('tipo_id') == '1'){ ?>
                <img src="http://<?php echo APP_HOST; ?>/public/img/despesa.png" class="img-fluid" alt="image">
            <?php }else{ ?>
                <img src="http://<?php echo APP_HOST; ?>/public/img/receita.png" class="img-fluid" alt="image">
            <?php } ?>
            </div>
            <div class="col-md-6">
                <h2 class="signin-text mb-3" style="margin-top:100px;"> Alterar <?php echo $viewVar['nomeTransacao'] ?></h2>
                <p>Por favor, preencha os campos para serem alterados</p>
                <br/>
                <div>
                    <form action="http://<?php echo APP_HOST; ?>/transacao/atualizar" method="post">
                        <input type="hidden" name="tran_id" value="<?php echo $viewVar['transacao']->__get('tran_id'); ?>">
                        <input type="hidden" name="tipo_id" value="<?php echo $viewVar['transacao']->__get('tipo_id'); ?>">
                        <div>
                            <label for="tran_data">Data</label>
                            <input type="date" name="tran_data" id="tran_data" class="form-control" value="<?php echo (new DateTime($viewVar['transacao']->__get('tran_data')))->format('Y-m-d'); ?>">
                        </div>
                        </br>
                        <div>
                            <label for="tran_valor">Valor</label>
                            <input type="number" name="tran_valor" id="tran_valor" class="form-control" value="<?php echo $viewVar['transacao']->__get('tran_valor'); ?>">
                        </div>
                        </br>
                        <div>
                            <label for="tran_descricao">Descrição</label>
                            <input type="text" name="tran_descricao" id="tran_descricao" class="form-control" value="<?php echo $viewVar['transacao']->__get('tran_descricao'); ?>">
                        </div>
                        </br>
                        <div>
                            <input type="submit" class="btn btn-primary" name="enviar" value="Alterar">
                            <a href="http://<?php echo APP_HOST; ?>/transacao/<?= $viewVar['nomeTransacao'] ?>s" class="btn btn-secondary">Cancelar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>