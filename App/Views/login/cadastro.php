<link href="http://<?php echo APP_HOST; ?>/public/css/style.css" rel="stylesheet">
<!-- <div class="container">
    <h1>Cadastro</h1>
    <p>Por favor, preencha os campos do formulário para criar a sua conta.</p>
    <hr />
    <div class="row">
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo"><img src="http://<?php echo APP_HOST; ?>/public/img/logoBranca3.png" alt=""></label>
        <ul>
            <li><a href="./index.php">Sair</a></li>
        </ul>
    </nav>
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
            } ?> -->
<nav>
    <input type="checkbox" id="check">
    <label for="check" class="checkbtn">
        <i class="fas fa-bars"></i>
    </label>
    <label class="logo"><img src="http://<?php echo APP_HOST; ?>/public/img/logoBranca3.png" alt=""></label>
    <ul>
        <li><a href="./index.php">Sair</a></li>
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
                            <input type="senha" class="form-control" name="senha" placeholder="Sua senha" value="<?php echo $Sessao::retornaValorFormulario('senha'); ?>" required>
                        </div>
                        <br />
                        <div class="form-group">
                            <label for="senha_confirme">Confirmação da Senha:</label>
                            <input type="password" class="form-control" name="senha_confirme" placeholder="Confirmação da senha" value="<?php echo $Sessao::retornaValorFormulario('senha_confirme'); ?>" required>
                        </div>

                        <!-- <div>
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
                    <br /> -->
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