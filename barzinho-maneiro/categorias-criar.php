<?php require_once 'cabecalho.php'; 
?>

<h2>Criar nova categoria</h2>
<form name="nova-categoria" method="post" action="categorias-criar-post.php">
    <label>Nome da categoria</label>
    <input name="nome" maxlength="20">
    <br>
    <button type="submit">Salvar</button>
</form>
<?php require_once 'rodape.php'; ?>