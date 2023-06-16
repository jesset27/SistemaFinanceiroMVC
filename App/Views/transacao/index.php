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
    <h2 class="signin-text mb-3"><?= $viewVar['nomeTransacao'] ?></h2>
    <p>Listagem de <?= $viewVar['nomeTransacao'] ?> cadastradas.</p>
    <br />
    <hr>
    <form class="data" method="post">
      <h4 class="tituloData">Selecione uma data</h4>
      <input type="month" id="mes_ano" name="mes_ano" value="<?= $viewVar['dataCompleta'] ?>">
      <input type="submit" value="buscar">
    </form>
    <br></br>
    <div class="float-right p-1">
      <a href="http://<?php echo APP_HOST . '/transacao/' . $viewVar['insere']; ?>"><button type="button" class="btn btn-primary-acao">+ Novo</button></a>
    </div>

    <table class="table table-striped table-bordered table-hover">

      <thead>
        <tr class="table-info" style="text-align:center">
          <th scope="col" style="width: 5%;">#</th>
          <th scope="col">Descrição</th>
          <th scope="col" style="width: 20%;">Data Transação</th>
          <th scope="col" style="width: 15%;">Valor Transação</th>
          <th scope="col" style="width: 25%;">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($viewVar['listaTransacao'] as $transacao) { ?>
          <tr>
            <td style="text-align:center"><?php echo $transacao->__get('tran_id'); ?></td>
            <td style="text-align:center"><?php echo $transacao->__get('tran_descricao'); ?></td>
            <td style="text-align:center"><?php echo date("d/m/Y", strtotime($transacao->__get('tran_data'))); ?></td>
            <td style="text-align:center">R$ <?= number_format($transacao->__get('tran_valor'), 2, ',', '.'); ?></td>
            <td style="text-align:center">
              <a href="http://<?php echo APP_HOST . '/transacao/' . $viewVar['edicao']; ?>/<?php echo $transacao->__get('tran_id'); ?>"><button type="button" class="btn btn-primary-acao">Editar</button></a>
              <a href="http://<?php echo APP_HOST; ?>/transacao/excluir?tran_id=<?php echo $transacao->__get('tran_id'); ?>&tran_tipo=<?= $viewVar['nomeTransacao'] ?>"><button type="button" class="btn btn-danger">Excluir</button></a>
            </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>