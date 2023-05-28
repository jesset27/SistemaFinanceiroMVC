<div class="container">
    <h1>Criar Conta</h1>
    <p>Por favor, preencha os campos do formulário para criar a sua conta.</p>
    <hr />
    <div class="row">
        <div class="col-md-6" style="padding-left: 40px;">
            <br />
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
            <div class="table-responsive">
                <form action="http://<?php echo APP_HOST; ?>/usuario/registrar" method="post" id="form_cadastro">
                    <div>
                        <label for="estado">Estado*</label>
                        <select class="form-select form-control" name="estado" id="estado" value="<?php echo $Sessao::retornaValorFormulario('estado'); ?>">
                            <option value="0"> Escolha seu estado</option>
                            <option value="ac" <?= $estado === "ac" ? "selected" : "" ?>>Acre</option>
                            <option value="al" <?= $estado === "al" ? "selected" : "" ?>>Alagoas</option>
                            <option value="am" <?= $estado === "am" ? "selected" : "" ?>>Amazonas</option>
                            <option value="ap" <?= $estado === "ap" ? "selected" : "" ?>>Amapá</option>
                            <option value="ba" <?= $estado === "ba" ? "selected" : "" ?>>Bahia</option>
                            <option value="ce" <?= $estado === "ce" ? "selected" : "" ?>>Ceará</option>
                            <option value="df" <?= $estado === "df" ? "selected" : "" ?>>Distrito Federal</option>
                            <option value="es" <?= $estado === "es" ? "selected" : "" ?>>Espírito Santo</option>
                            <option value="go" <?= $estado === "go" ? "selected" : "" ?>>Goiás</option>
                            <option value="ma" <?= $estado === "ma" ? "selected" : "" ?>>Maranhão</option>
                            <option value="mt" <?= $estado === "mt" ? "selected" : "" ?>>Mato Grosso</option>
                            <option value="ms" <?= $estado === "ms" ? "selected" : "" ?>>Mato Grosso do Sul</option>
                            <option value="mg" <?= $estado === "mg" ? "selected" : "" ?>>Minas Gerais</option>
                            <option value="pa" <?= $estado === "pa" ? "selected" : "" ?>>Pará</option>
                            <option value="pb" <?= $estado === "pb" ? "selected" : "" ?>>Paraíba</option>
                            <option value="pr" <?= $estado === "pr" ? "selected" : "" ?>>Paraná</option>
                            <option value="pe" <?= $estado === "pe" ? "selected" : "" ?>>Pernambuco</option>
                            <option value="pi" <?= $estado === "pi" ? "selected" : "" ?>>Piauí</option>
                            <option value="rj" <?= $estado === "rj" ? "selected" : "" ?>>Rio de Janeiro</option>
                            <option value="rn" <?= $estado === "rn" ? "selected" : "" ?>>Rio Grande do Norte</option>
                            <option value="ro" <?= $estado === "ro" ? "selected" : "" ?>>Rondônia</option>
                            <option value="rs" <?= $estado === "rs" ? "selected" : "" ?>>Rio Grande do Sul</option>
                            <option value="rr" <?= $estado === "rr" ? "selected" : "" ?>>Roraima</option>
                            <option value="sc" <?= $estado === "sc" ? "selected" : "" ?>>Santa Catarina</option>
                            <option value="se" <?= $estado === "se" ? "selected" : "" ?>>Sergipe</option>
                            <option value="sp" <?= $estado === "sp" ? "selected" : "" ?>>São Paulo</option>
                            <option value="to" <?= $estado === "to" ? "selected" : "" ?>>Tocantins</option>
                        </select>
                    </div>
                    </br>
                    <div>
                        <label for="cep">CEP*</label>
                        <input type="text" class="form-control" name="cep" placeholder="87624-457" value="<?php echo $Sessao::retornaValorFormulario('cep'); ?>" required>
                    </div>
                    </br>
                    <div>
                        <label for="cidade">Cidade*</label>
                        <input type="text" class="form-control" name="cidade" placeholder="Cidade" value="<?php echo $Sessao::retornaValorFormulario('cidade'); ?>" required>
                    </div>
                    </br>
                    <div>
                        <label for="logradouro">Logradouro*</label>
                        <input type="text" class="form-control" name="logradouro" placeholder="Rua Joaquim" value="<?php echo $Sessao::retornaValorFormulario('logradouro'); ?>" required>
                    </div>
                    </br>
                    <div>
                        <label for="numero">Número*</label>
                        <input type="text" class="form-control" name="numero" placeholder="102" value="<?php echo $Sessao::retornaValorFormulario('numero'); ?>" required>
                    </div>
                    </br>
                    <div>
                        <label for="bairro">Bairro*</label>
                        <input type="text" class="form-control" name="bairro" placeholder="Bairro" value="<?php echo $Sessao::retornaValorFormulario('numero'); ?>" required>
                    </div>
                    <br />
                    <button type="submit" class="btn btn-success btn-sm"><span class="glyphicon glyphicon-floppy-disk" aria-hidden="true"></span> Salvar </button>
                    <a href="http://<?php echo APP_HOST; ?>/login" class="btn btn-info btn-sm"><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Cancelar </a>
                    <p>Possui uma conta? <a href="http://<?php echo APP_HOST; ?>/login">Fazer login</a></p>
                </form>
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>
</div>