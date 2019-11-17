<?php require_once 'cabecalho.php'; ?>

<h2>Criar novo usuário</h2>

<form name="novo-usuario" method="post" action="usuarios-criar-post.php">
    <div class="row">
        <div>
            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" name="nomeUsuario" class="form-control" placeholder="Nome completo do usuário" required>
            </div>
            <div class="form-group">
                <label for="nome">CPF</label>
                <input type="text" name="cpf" class="form-control" placeholder="CPF do usuário" required>
            </div>
            <div class="form-group">
                <label for="nome">Usuário</label>
                <input type="text" name="usuario" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome">Senha</label>
                <input type="password" name="senha" maxlength="10" title="Máximo de 10 caracteres" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nome">Tipo</label>
                <select class="form-control" name="tipo">
                    <option value="10">Funcionário</option>
                    <option value="20">Gerente</option>
                </select>
            </div>
            <input type="submit" class="btn btn-success btn-block" value="Salvar">
        </div>
    </div>
</form>

<?php require_once 'rodape.php'; ?>

