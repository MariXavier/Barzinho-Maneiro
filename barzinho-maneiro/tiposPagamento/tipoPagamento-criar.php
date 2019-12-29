<?php 
    require_once '../cabecalho.php';
?>
<h2>Criar novo tipo de pagamento</h2>
<form action="/barzinho-maneiro/tiposPagamento/tipoPagamento-criar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="nome">Código</label>
                <input type="text" name="codigo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <input type="submit" name="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once '../rodape.php' ?>


