<?php
require_once 'classes/Categoria.php';

$categoria = new Categoria();
$lista = $categoria->listar();
echo "<pre>";
print_r($lista);
echo "</pre>";


require_once 'cabecalho.php';
?>

<h2>Categorias</h2>

<a href="categorias-criar.php" class="btn btn-success">Adicionar categoria</a>

<table class="table">
    <thead>
        <th>pkCategoria</th>
        <th>Categoria</th>
        <th>Ações</th>
    </thead>
    <tbody>
        <?php 
            foreach($lista as $linha) 
            {  
        ?>
                <tr>
                    <td><?php echo $linha['pkCategoria']; ?></td>
                    <td><?php echo $linha['nome']; ?></td>
                    <td>
                        <a href="categorias-editar.php" class="btn btn-info"> Alterar </a>
                        <a href="categorias-excluir.php?codigo=<?php echo $linha['pkCategoria']; ?>" class="btn btn-danger"> Excluir </a>
                    </td>
                </tr>
        <?php
            }
        ?>
        
       
       
    </tbody>
</table>

<?php
require_once 'rodape.php';
?>