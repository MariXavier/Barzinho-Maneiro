<?php 
    require_once '../cabecalho.php';
    require_once "../classes/TipoPagamento.php";
    $pkFormaPagamento = $_GET["codigo"];

    $tipoPagamento = new TipoPagamento();
    $formaPagamento = $tipoPagamento -> listarUnicoTipoPagamentos($pkFormaPagamento)

?>
<h2>Alterar tipo de pagamento</h2>
<form action="/barzinho-maneiro/tiposPagamento/tipoPagamento-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Código</label>
                <input type="text" value="<?php echo $formaPagamento["codigo"] ?>" name="codigo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" value="<?php echo $formaPagamento["nome"] ?>" name="nome" class="form-control" required>
            </div>
            <input type="hidden" value="<?php echo $formaPagamento["pkFormaPagamento"] ?>" name="pkFormaPagamento">
            <input type="submit" name="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once '../rodape.php' ?>


