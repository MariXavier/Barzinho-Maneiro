<?php
    require_once 'cabecalho.php';
    require_once 'classes/Usuario.php';

    $usuario = new Usuario();
    $listaUsuarios = $usuario -> listarUsuarios();
?>

<h2>Histórico de pedidos</h2>

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
        <button type="submit" id="btnPesquisar" class="btn btn-success">Pesquisar</button>
    </div>
</div>

<table class="table" id="tabelaHistorico">
    <thead>
        <th style="text-align: center;">Nº pedido</th>
        <th style="text-align: center;">Data</th>
        <th style="text-align: center;">Funcionário</th>
        <th style="text-align: center;">Produtos</th>
        <th>Valor total</th>
    </thead>
    <tbody>
    </tbody>
</table>

<?php
require_once 'rodape.php';
?>

<script>    
    $(function()
    { 
        $('#ctData').datepicker(
        {
            dateFormat:'dd/mm/yy',
        }); 
    });

    $("#btnPesquisar").click(function()
    {
        var pkFuncionario = $("#cbFuncionario").val();
        var data = $("#ctData").datepicker("getDate");
        var dataSelecionada = $.datepicker.formatDate("yy-mm-dd", data);
        
        if(pkFuncionario != null && pkFuncionario != undefined && dataSelecionada != null && dataSelecionada != undefined && dataSelecionada != "")
        {
            console.log(pkFuncionario, dataSelecionada, typeof(dataSelecionada));
            $.ajax(
            {
                url: "buscar-historico-pedido.php", 
                type : 'post',
                data: { data: dataSelecionada, pk: pkFuncionario },
                dataType: 'text',
                success: function(result)
                {
                    console.dir(result);
                    $("#tabelaHistorico > tbody").empty();
                    $("#tabelaHistorico tbody:last-child").append(result);
                }
            });
        }
        else
        {
            alert("Selecione um funcionário e uma data para realizar a pesquisa");
        }
    });
    
</script>   
