<link href="http://<?php echo APP_HOST; ?>/public/css/style-dashboard.css" rel="stylesheet">
<div class="row">
    <div class="col-12">
        <section id="interface" style="margin-left:300px">
            <div class="navigation">
                <div class="profile">
                    <img src="http://<?php echo APP_HOST; ?>/public/img/usuario.png" alt="">
                    <p><?php echo "Olá, ", $_SESSION['uso_nome'] ?></p>
                </div>
            </div>

            <h3 class="i-name">
                Dashboard
            </h3>
            <?php if ($Sessao::retornaMensagem()) { ?>
                <div class="col-12">
                    <div class="alert alert-warning" role="alert">
                        <?= $Sessao::retornaMensagem() ?>
                    </div>
                    <br />
                </div>
            <?php } ?>
            <form class="data" method="post">
                <h4 class="tituloData">Selecione uma data</h4>
                <input type="month" id="mes_ano" name="mes_ano" value="<?= $viewVar['dataCompleta'] ?>">
                <input type="submit" value="buscar">
            </form>
            <br></br>
            <div class="values">
                <div class="row">
                    <div class="col mb-2">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="las la-long-arrow-alt-up"></i>
                                <span>Receita</span>
                                <h3>R$ <?= number_format($viewVar['total_receita'], 2, ',', '.'); ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="col mb-2">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="las la-arrow-down"></i>
                                <span>Despesas</span>
                                <h3>R$ <?= number_format($viewVar['total_despesa'], 2, ',', '.'); ?></h3>
                            </div>
                        </div>
                    </div>

                    <div class="col mb-2">
                        <div class="card h-100">
                            <div class="card-body">
                                <i class="las la-wallet"></i>
                                <span>Saldo atual</span>
                                <h3>R$ <?= number_format($viewVar['saldo_atual'], 2, ',', '.'); ?></h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>