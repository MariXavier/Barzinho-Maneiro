<?php require_once 'classes/Usuario.php' ?>
<?php require_once 'cabecalho.php' ?>

<?php
$usuario = new Usuario();
$listaUsuarios = $usuario->listarUsuarios();
echo "<pre>";
print_r($listaUsuarios);
echo "</pre>";
?>

<h2>Usuários</h2>

<a href="usuarios-criar.php" class="btn btn-success">Adicionar novo usuário</a>

<table class="table">
    <thead>
        <th>pkUsuario</th>
        <th>Usuário</th>
        <th>Senha</th>
        <th></th>
    </thead>
    <tbody>
        <?php 
        foreach($listaUsuarios as $linha) 
        { ?>
            <tr>
                <td><?php echo $linha['pkUsuario']; ?></td>
                <td><?php echo $linha['usuario']; ?></td>
                <td><?php echo $linha['senha']; ?></td>
                <td>
                    <a href="usuarios-editar.php" class="btn btn-info"> Alterar </a>
                    <a href="usuarios-excluir.php" class="btn btn-danger"> Excluir </a>
                </td>
            </tr>
        <?php 
        }?>    
    </tbody>
</table>
    
<?php
require_once 'rodape.php';
?>