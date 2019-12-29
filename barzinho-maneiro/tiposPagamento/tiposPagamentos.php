<?php 
    require_once '../cabecalho.php'; 
    require_once "../classes/TipoPagamento.php";

    $tipoPagamento = new TipoPagamento();
    $listaPagamentos = $tipoPagamento -> listarTipoPagamentos();
?>
<h2>Tipos de pagamento</h2>
<a href="/barzinho-maneiro/tiposPagamento/tipoPagamento-criar.php" class="btn btn-info">Criar novo tipo de pagamento</a>

<table class="table">
    <thead>
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th class="acao">Editar</th>
        <th class="acao">Excluir</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($listaPagamentos as $linha){ ?>
            <tr>
                <td><?php echo $linha['codigo']; ?></td>
                <td><?php echo $linha['nome']; ?></td>
                <td><a href="tipoPagamento-editar.php?codigo=<?php echo $linha['pkFormaPagamento']; ?>" class="btn btn-info">Editar</a></td>
                <td><a href="tipoPagamento-excluir.php?codigo=<?php echo $linha['pkFormaPagamento']; ?>" class="btn btn-danger">Excluir</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php require_once '../rodape.php' ?>
