<?php 
    require_once 'cabecalho.php';
    require_once 'classes/Produto.php';
    require_once 'classes/Categoria.php';

    $pkProduto = $_GET['codigo'];
    $produto = new Produto();
    $categoria = new Categoria();

    $produtoUnico = $produto ->listarUnicoProduto($pkProduto);
    $listaCategoria = $categoria -> listar(); 

?>
<div class="row">
    <div class="col-md-12">
        <h2>Editar Produto</h2>
    </div>
</div>

<form action="produtos-editar-post.php" method="post">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="form-group">
                <input type="hidden" name= "pkProduto" value="<?php echo $produtoUnico['pkProduto']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome">Código</label>
                <input type="text" name= "codigo" value="<?php echo $produtoUnico['codigo']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name= "nome" value="<?php echo $produtoUnico['nome']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="number" name= "preco" value="<?php echo $produtoUnico['preco']; ?>" step="0.01" min="0" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome">Categoria</label>
                <select class="form-control" name= "categoria">
                    <?php foreach ($listaCategoria as $linha){ ?>
                        <option 
                            value="<?php echo $linha['pkCategoria']; ?>"
                            <?php echo ($linha['pkCategoria'] == $produtoUnico['fkCategoria'] ? "selected" : "") ?>
                        >
                            <?php echo $linha['nome']; ?>
                        </option>
                    <?php } ?>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php' ?>
