<?php require_once 'classes/Usuario.php' ?>
<?php require_once 'cabecalho.php' ?>

<?php
$usuario = new Usuario();
$listaUsuarios = $usuario->listarUsuarios();
?> 

<h2>Usuários</h2>

<a href="usuarios-criar.php" class="btn btn-success">Adicionar novo usuário</a>

<table class="table">
    <thead>
        <th>Nome</th>
        <th>Usuário</th>
        <th>Tipo</th>
        <th></th>
    </thead>
    <tbody>
        <?php 
        foreach($listaUsuarios as $linha) 
        { ?>
            <tr>
                <td><?php echo $linha['nome']; ?></td>
                <td><?php echo $linha['usuario']; ?></td>
                <td><?php echo ($linha['tipo'] == 10 ? "Funcionário" : "Gerente"); ?></td>
                <td>
                    <a href="usuarios-editar.php?codigo=<?php echo $linha['pkUsuario']; ?>" class="btn btn-info"> Alterar </a>
                    <a href="usuarios-excluir.php?codigo=<?php echo $linha['pkUsuario']; ?>" class="btn btn-danger"> Excluir </a>
                </td>
            </tr>
        <?php 
        }?>    
    </tbody>
</table>
    
<?php
require_once 'rodape.php';
?>