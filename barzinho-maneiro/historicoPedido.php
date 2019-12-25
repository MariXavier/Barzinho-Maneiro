<?php
    require_once 'cabecalho.php';
    require_once 'classes/Usuario.php';

    $usuario = new Usuario();
    $listaUsuarios = $usuario -> listarUsuarios();
?>

<h2>Histórico de pedidos</h2>


<form name="pesquisar-historico-pedido" action="buscar-historico-pedido.php" method="post">
    <div class="linha-base-pedido">
        <div class="form-group">
            <label>Funcionário</label>
            <select class="form-control" name="funcionario" id="cbFuncionario">
            <?php foreach($listaUsuarios as $usuario) { ?>
                <option value="<?php echo $usuario["pkUsuario"] ?>"><?php echo $usuario["nome"] ?></option>    
            <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="nome">Data</label>
            <input type="text" name="data" id="ctData" class="form-control">
        </div>
        <div class="botao-historico">
            <button type="submit" class="btn btn-success">Pesquisar</button>
        </div>
    </div>
    
</form>

<table class="table">
    <thead>
        <th>Data</th>
        <th>Nº Pedido</th>
        <th>Funcionário</th>
        <th>Valor total</th>
    </thead>
    <tbody>
        <tr>
            <td>17/12/2019</td>
            <td>48</td>
            <td>Bob</td>
            <td>10,50</td>
        </tr>
    </tbody>
</table>

<?php
require_once 'rodape.php';
?>

<script>    
    $(function(){ $('#ctData').datepicker(); });
</script>   
