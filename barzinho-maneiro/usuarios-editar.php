<?php
    require_once 'cabecalho.php';
    require_once 'classes\Usuario.php';
    $pkUsuario = $_GET['codigo'];

    $usuario = new Usuario();
    $linha = $usuario -> listarUnicoUsuario($pkUsuario);
?>

<h2>Alterar informações do usuário</h2>

<form name="alterar-usuario" method="post" action="usuarios-alterar-post.php">
    <div class="row">
        <div>
        <div class="form-group">
                <input type="hidden" name="pkUsuario" value="<?php echo $linha['pkUsuario']; ?>" class="form-control">
            </div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nomeUsuario" value="<?php echo $linha['nome']; ?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome">CPF</label>
                <input type="text" name="cpf" class="form-control" value="<?php echo $linha['cpf']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nome">Usuário</label>
                <input type="text" name="usuario" value="<?php echo $linha['usuario']?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome">Senha</label>
                <input type="password" name="senha" maxlength="10" value="<?php echo $linha['senha']?>" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome">Tipo</label>
                <select class="form-control" name="tipo">
                    <option value="10" <?php echo ($linha['tipo'] == 10 ? "selected" : "") ?>>Funcionário</option>
                    <option value="20" <?php echo ($linha['tipo'] == 20 ? "selected" : "") ?>>Gerente</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Alterar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php'; ?>