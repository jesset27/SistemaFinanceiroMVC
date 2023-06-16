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
            <h1 class="signin-text mb-3"> Cadastrar Endereço</h1>
            <p>Por favor, preencha os campos do formulário para cadastrar endereço.</p>
            <hr />
            <br />
            
            <div class="table-responsive">
                <form action="http://<?php echo APP_HOST; ?>/endereco/<?php echo $viewVar['formAction']; ?>" method="post" id="form_cadastro">
                    <input type="hidden" class="form-control" name="uso_id" id="uso_id" value="<?php echo $viewVar['endereco']->__get('uso_id'); ?>">
                    <br />
                    <div class="form-group">
                        <label for="estado">Estado*</label>
                        <select class="form-select form-control" name="estado" id="estado" value="<?php echo $viewVar['endereco']->__get('end_uf'); ?>">
                            <option value="0"> Escolha seu estado</option>
                            <option value="ac" <?= $viewVar['endereco']->__get('end_uf') === "ac" ? "selected" : "" ?>>Acre</option>
                            <option value="al" <?= $viewVar['endereco']->__get('end_uf') === "al" ? "selected" : "" ?>>Alagoas</option>
                            <option value="am" <?= $viewVar['endereco']->__get('end_uf') === "am" ? "selected" : "" ?>>Amazonas</option>
                            <option value="ap" <?= $viewVar['endereco']->__get('end_uf') === "ap" ? "selected" : "" ?>>Amapá</option>
                            <option value="ba" <?= $viewVar['endereco']->__get('end_uf') === "ba" ? "selected" : "" ?>>Bahia</option>
                            <option value="ce" <?= $viewVar['endereco']->__get('end_uf') === "ce" ? "selected" : "" ?>>Ceará</option>
                            <option value="df" <?= $viewVar['endereco']->__get('end_uf') === "df" ? "selected" : "" ?>>Distrito Federal</option>
                            <option value="es" <?= $viewVar['endereco']->__get('end_uf') === "es" ? "selected" : "" ?>>Espírito Santo</option>
                            <option value="go" <?= $viewVar['endereco']->__get('end_uf') === "go" ? "selected" : "" ?>>Goiás</option>
                            <option value="ma" <?= $viewVar['endereco']->__get('end_uf') === "ma" ? "selected" : "" ?>>Maranhão</option>
                            <option value="mt" <?= $viewVar['endereco']->__get('end_uf') === "mt" ? "selected" : "" ?>>Mato Grosso</option>
                            <option value="ms" <?= $viewVar['endereco']->__get('end_uf') === "ms" ? "selected" : "" ?>>Mato Grosso do Sul</option>
                            <option value="mg" <?= $viewVar['endereco']->__get('end_uf') === "mg" ? "selected" : "" ?>>Minas Gerais</option>
                            <option value="pa" <?= $viewVar['endereco']->__get('end_uf') === "pa" ? "selected" : "" ?>>Pará</option>
                            <option value="pb" <?= $viewVar['endereco']->__get('end_uf') === "pb" ? "selected" : "" ?>>Paraíba</option>
                            <option value="pr" <?= $viewVar['endereco']->__get('end_uf') === "pr" ? "selected" : "" ?>>Paraná</option>
                            <option value="pe" <?= $viewVar['endereco']->__get('end_uf') === "pe" ? "selected" : "" ?>>Pernambuco</option>
                            <option value="pi" <?= $viewVar['endereco']->__get('end_uf') === "pi" ? "selected" : "" ?>>Piauí</option>
                            <option value="rj" <?= $viewVar['endereco']->__get('end_uf') === "rj" ? "selected" : "" ?>>Rio de Janeiro</option>
                            <option value="rn" <?= $viewVar['endereco']->__get('end_uf') === "rn" ? "selected" : "" ?>>Rio Grande do Norte</option>
                            <option value="ro" <?= $viewVar['endereco']->__get('end_uf') === "ro" ? "selected" : "" ?>>Rondônia</option>
                            <option value="rs" <?= $viewVar['endereco']->__get('end_uf') === "rs" ? "selected" : "" ?>>Rio Grande do Sul</option>
                            <option value="rr" <?= $viewVar['endereco']->__get('end_uf') === "rr" ? "selected" : "" ?>>Roraima</option>
                            <option value="sc" <?= $viewVar['endereco']->__get('end_uf') === "sc" ? "selected" : "" ?>>Santa Catarina</option>
                            <option value="se" <?= $viewVar['endereco']->__get('end_uf') === "se" ? "selected" : "" ?>>Sergipe</option>
                            <option value="sp" <?= $viewVar['endereco']->__get('end_uf') === "sp" ? "selected" : "" ?>>São Paulo</option>
                            <option value="to" <?= $viewVar['endereco']->__get('end_uf') === "to" ? "selected" : "" ?>>Tocantins</option>
                        </select>
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="cep">CEP*</label>
                        <input type="text" class="form-control" name="cep" placeholder="87624-457" value="<?php echo $viewVar['endereco']->__get('end_cep'); ?>" required>
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="cidade">Cidade*</label>
                        <input type="text" class="form-control" name="cidade" placeholder="Cidade" value="<?php echo $viewVar['endereco']->__get('end_cidade'); ?>" required>
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="logradouro">Logradouro*</label>
                        <input type="text" class="form-control" name="logradouro" placeholder="Rua Joaquim" value="<?php echo $viewVar['endereco']->__get('end_logradouro'); ?>" required>
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="numero">Número*</label>
                        <input type="text" class="form-control" name="numero" placeholder="102" value="<?php echo $viewVar['endereco']->__get('end_num'); ?>" required>
                    </div>
                    </br>
                    <div class="form-group">
                        <label for="bairro">Bairro*</label>
                        <input type="text" class="form-control" name="bairro" placeholder="Bairro" value="<?php echo $viewVar['endereco']->__get('end_bairro'); ?>" required>
                    </div>
                    <br />
                    <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar </button>
                    <a href="http://<?php echo APP_HOST; ?>/login/dashboard" class="btn btn-secondary"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Cancelar </a>
                </form>
            </div>
        </div>
    </div>
</div>