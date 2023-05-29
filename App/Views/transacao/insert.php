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
                <?php if ($viewVar['tipo_id'] == '1') { ?>
                    <img src="http://<?php echo APP_HOST; ?>/public/img/despesa.png" class="img-fluid" alt="image">
                <?php } else { ?>
                    <img src="http://<?php echo APP_HOST; ?>/public/img/receita.png" class="img-fluid" alt="image">
                <?php } ?>
            </div>
            <div class="col-md-6">
                <h2 class="signin-text mb-3" style="margin-top:100px;"><?php echo $viewVar['nomeTransacao'] ?></h2>
                <p>Cadastro de <?php echo $viewVar['nomeTransacao'] ?></p>
                <br />
                <div class="wrapper">
                    <form action="http://<?php echo APP_HOST; ?>/transacao/salvar" method="post" id="form_cadastro" enctype="multipart/form-data">
                        <input type="hidden" name="tipo_id" id="tipo_id" value="<?php echo $viewVar['tipo_id']; ?>">
                        <label for="tran_data">Data Transação</label>
                        <input type="date" name="tran_data" id="tran_data" class="form-control" style="width: 500px;" value="<?php echo $Sessao::retornaValorFormulario('tran_data'); ?>" required><br>
                        <label for="tran_valor">Valor Transação</label>
                        <input type="number" name="tran_valor" id="tran_valor" class="form-control" style="width: 500px;" value="<?php echo $Sessao::retornaValorFormulario('tran_valor'); ?>" required><br>
                        <label for="tran_descricao">Descrição</label>
                        <input type="text" name="tran_descricao" id="tran_descricao" class="form-control" style="width: 500px;" value="<?php echo $Sessao::retornaValorFormulario('tran_descricao'); ?>" required><br>
                        <br />
                        <input type="submit" name="enviar" value="Inserir" class="btn btn-primary w100">
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>