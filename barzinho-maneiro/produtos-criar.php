<?php 
    require_once 'cabecalho.php';
    require_once 'classes/Categoria.php';
    $categoria = new Categoria();
    $lista = $categoria -> listar();
?>
<h2>Criar Novo Produto</h2>
<form action="produtos-criar-post.php" method="post" enctype="multipart/form-data">
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
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" name="preco" step="0.01" min="0" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome">Categoria</label>
                <select class="form-control" name="categoria">
                    <?php foreach($lista as $linha){ ?>
                        <option value="<?php echo $linha['pkCategoria']; ?>">
                            <?php echo $linha['nome']; ?>
                        </option>
                    <?php } ?> 
                </select>
            </div>
            <div class="form-group">
                <label for="imagem">Imagem</label>
                <input type="file" name="file" id="ctImagem" class="form-control" required>
            </div>
            <input type="submit" name="submit" id="btnSalvar" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>

<script>
    $("#btnSalvar").click(function()
    {
        var extensao = $("#ctImagem").val().split('.').pop().toLowerCase();
        if(jQuery.inArray(extensao,["png", "jpg", "jpeg"]) == -1)
        {
            alert("Tipo de imagem inválida. Insira uma imagem png, jpg ou jpeg");
            $("#ctImagem").val("");
            return false;
        }
    });
</script>
