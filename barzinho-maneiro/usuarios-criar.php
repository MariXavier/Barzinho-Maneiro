<?php require_once 'cabecalho.php'; ?>

<h2>Criar novo usuário</h2>

<form name="novo-usuario" method="post" action="usuarios-criar-post.php">
    <label>Usuário</label>
    <input name="usuario" maxlength="30">
    <br>
    <label>Senha</label>
    <input type="password" name="senha" maxlength="10" title="Máximo de 10 caracteres">
    <br><br>
    <button type="submit">Salvar</button>
</form>

<?php require_once 'rodape.php'; ?>

