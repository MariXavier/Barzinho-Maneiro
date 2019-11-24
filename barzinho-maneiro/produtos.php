<?php 
    require_once 'cabecalho.php'; 
    require_once 'classes/Produto.php';

    $produto = new Produto();
    $lista = $produto -> listarProdutos();

?>
<h2>Produtos</h2>
<a href="produtos-criar.php" class="btn btn-info">Criar Novo Produto</a>

<table class="table">
    <thead>
    <tr>
        <th>Código</th>
        <th>Nome</th>
        <th>Preço</th>
        <th>Categoria</th>
        <th class="acao">Editar</th>
        <th class="acao">Excluir</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach($lista as $linha){ ?>
            <tr>
                <td><?php echo $linha['codigo']; ?></td>
                <td><?php echo $linha['nome']; ?></td>
                <td><?php echo $linha['preco']; ?></td>
                <td><?php echo $linha['categoriaProduto']; ?></td>
                <td><a href="produtos-editar.php?codigo=<?php echo $linha['pkProduto']; ?>" class="btn btn-info">Editar</a></td>
                <td><a href="produtos-excluir.php?codigo=<?php echo $linha['pkProduto']; ?>" class="btn btn-danger">Excluir</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php require_once 'rodape.php' ?>
