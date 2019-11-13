<?php
    $pkCategoria = $_GET['codigo'];

    require_once 'cabecalho.php';
    require_once 'classes\Categoria.php';

    $categoria = new Categoria();
    $linha = $categoria -> listarUnicaCategoria($pkCategoria);
?>

<h2> Alterar categoria</h2>
<form name="alterar-categoria" action="categorias-editar-post.php" method="post">
<input type="hidden" name="pkCategoria" value="<?php echo $pkCategoria; ?>">
Descrição:
<input name="nome" value="<?php echo $linha['nome']; ?>">
<button type="submit">Salvar</button>

<?php
    require_once 'rodape.php';
?>