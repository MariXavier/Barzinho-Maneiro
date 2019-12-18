<?php
    require_once 'cabecalho.php';
?>

<h2>Histórico de pedidos</h2>




<form name="pesquisar-historico-pedido" action="buscar-historico-pedido.php" method="post">
    <div class="form-group">
        <label>Funcionário</label>
        <select class="form-control" name="funcionario" id="cbFuncionario">
            <option value="1">Bob</option>
            <option value="2">Bob Jr</option>
        </select>
    </div>
    
    <div class="form-group">
        <label for="nome">Data</label>
        <input type="date" name= "data">
    </div>

    <input type="text" class="form-control" value="02-16-2012">

    <button type="submit" class="btn btn-success">Pesquisar</button>
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
    $('.datepicker').datepicker();
</script>   