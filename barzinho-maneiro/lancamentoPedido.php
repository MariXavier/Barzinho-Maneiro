<?php
    require_once 'cabecalho.php';
    require_once 'classes/Produto.php';
    require_once 'classes/Usuario.php';

    $produto = new Produto();
    $listaProdutos = $produto -> listarProdutos();

    $usuario = new Usuario();
    $listaUsuarios = $usuario->listarUsuarios();
?>

<h2>Lançar pedido</h2>
<form method="post" action="lancar-pedido-post.php">
    <div class="linha-base-pedido">
        <div>
            <label for="nome">Comanda</label>
            <input type="text" name="comanda" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="nome">Atendente</label>
            <select class="form-control" name="atendente" required>
                <?php foreach($listaUsuarios as $usuarios){ ?>
                    <option value="<?php echo $usuarios['pkUsuario']; ?>">
                        <?php echo $usuarios['nome']; ?>
                    </option>
                <?php } ?> 
            </select>
        </div>
        <div>
            <label for="nome">Total</label>
            <input type="text" name="total" class="form-control" id="ctPrecoTotal" disabled>
        </div>
        <div class="conjunto-botao-pedido">
            <button class="btn btn-info" id="btnLimpar">Limpar</button>
            <button class="btn btn-success" type="submit">Finalizar</button>
        </div>
    </div>

    <div class="painel-content">
        <div class="botao-content">
            <?php 
                foreach($listaProdutos as $prod)
                {  
            ?>
                    <button class="botao-pedido" id="btn-<?php echo $prod["codigo"]; ?>" data-pkProduto="<?php echo $prod["pkProduto"]; ?>" data-nome="<?php echo $prod["nome"]; ?>" data-preco="<?php echo $prod["preco"]; ?>">
                        <div class="imagem-pedido" style="background-image: url('Imagens/hamburguer.jpg');"></div>
                        <label><?php echo $prod["nome"]; ?></label>
                    </button> 
                    
            <?php
                }
            ?>
        </div>
        <div class="tabela-pedido">
            <table class="table" id="tabelaPedido">
                <thead>
                    <tr>
                        <th></th>
                        <th>Produto</th>
                        <th>Preço unitário</th>
                        <th>Preço total</th>
                        <th>Quantidade</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</form>
<?php require_once 'rodape.php' ?>

<script>


    $(".botao-pedido").click(function()
    {
        console.dir(this);
        var nome = this.dataset.nome;
        var preco = this.dataset.preco;
        var pkProduto = this.dataset.pkproduto;
        setLinhaPedido(nome,preco,pkProduto);
        console.log($("#btn-"+pkProduto));

        $("#btn-"+pkProduto).attr("disabled", true);
        $("#btn-"+pkProduto).addClass("botao-desabilitado");
    });

    function setLinhaPedido(nome,preco,pkProduto)
    {
        var $linha = $("<tr>"+
                        "<td><button class='cancelar-produto' onclick='removerProduto(this,"+pkProduto+");'><i class='fas fa-minus-circle remover-produto-icone'></i></button></td>"+
                        "<td>"+nome+"</td>"+
                        "<td>"+preco+"</td>"+
                        "<td id=tdPreco"+pkProduto+">"+preco+"</td>"+
                        "<td class='quantidade-tabela'><button class='btn btn-danger' onclick='subtrair(this,"+pkProduto+","+preco+");'>-</button><label>1</label><button class='btn btn-success' onclick='adicionar(this,"+pkProduto+","+preco+");'>+</button></td>"+
                    "</tr>");
        $("#tabelaPedido tbody:last-child").append($linha);
    }

    function adicionar(elemento,pkProduto,preco)
    {
        var quantidade = parseFloat($(elemento).prev().text());
        var precoTotal;
        quantidade++;
        $(elemento).prev().text(quantidade);
        precoTotal = preco*quantidade;
        $("#tdPreco"+pkProduto).text(precoTotal);
    }

    function subtrair(elemento,pkProduto,preco)
    {
        var quantidade = parseFloat($(elemento).next().text());
        var precoTotal;
        if(quantidade>0)
        { 
            quantidade--; 
            $(elemento).next().text(quantidade);
            precoTotal = preco*quantidade;
            $("#tdPreco"+pkProduto).text(precoTotal);
        }
    }
    function removerProduto(elemento,pkProduto)
    {
        $(elemento).closest("tr").empty();
        $("#btn-"+pkProduto).attr("disabled", false);
        $("#btn-"+pkProduto).removeClass("botao-desabilitado");
    }

    $("#tabelaPedido > tbody").change(function() {
        console.log("dasdas");
    });

    
    $("#btnLimpar").click(function()
    {
        $(".tabela-pedido > .table > tbody").empty();
        $(".botao-content button").attr("disabled", false);
        $(".botao-content button").removeClass("botao-desabilitado");
    });

    
    

    // var $row = $(".tabela-pedido > .table > tbody > tr");       // Finds the closest row <tr> 
    // $tds = $row.find("td");             // Finds all children <td> elements

    // $.each($tds, function() {               // Visits every single <td> element
    //     console.log($(this).text());        // Prints out the text within the <td>
    // });


</script>