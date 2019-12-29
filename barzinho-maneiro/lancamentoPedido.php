<?php
    require_once 'cabecalho.php';
    require_once 'classes/Produto.php';
    require_once 'classes/Usuario.php';
    require_once 'classes/TipoPagamento.php';

    $produto = new Produto();
    $listaProdutos = $produto -> listarProdutos();

    // echo "<pre>";
    // print_r($listaProdutos);
    // echo "</pre>";

    $usuario = new Usuario();
    $listaUsuarios = $usuario->listarUsuarios();

    $tipoPagamento = new TipoPagamento();
    $listaTipoPagamentos = $tipoPagamento->listarTipoPagamentos();
?>
<!-- method="post" action="lancar-pedido-post.php" -->
<h2>Lançar pedido</h2>
    <div class="linha-base-pedido">
        <div class="form-group">
            <label for="nome">Atendente</label>
            <select class="form-control" name="atendente" id="cbAtendente" required>
                <?php foreach($listaUsuarios as $usuarios){ ?>
                    <option value="<?php echo $usuarios['pkUsuario']; ?>">
                        <?php echo $usuarios['nome']; ?>
                    </option>
                <?php } ?> 
            </select>
        </div>
        <div class="form-group">
            <label for="nome">Forma pagamento</label>
            <select class="form-control" name="pagamento" id="cbPagamento" required>

                <?php foreach($listaTipoPagamentos as $tp){ ?>
                    <option value="<?php echo $tp['pkFormaPagamento']; ?>">
                        <?php echo $tp['nome']; ?>
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
            <button class="btn btn-success" id="btnFinalizar">Finalizar</button>
        </div>
    </div>

    <div class="painel-content">
        <div class="botao-content">
            <?php 
                foreach($listaProdutos as $prod)
                {  
            ?>
                    <button class="botao-pedido" id="btn-<?php echo $prod["pkProduto"]; ?>" data-pkProduto="<?php echo $prod["pkProduto"]; ?>" data-nome="<?php echo $prod["nome"]; ?>" data-preco="<?php echo $prod["preco"]; ?>">
                        <div class="imagem-pedido" style="background-image: url('<?php echo $prod["caminho"] ?>');"></div>
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

<?php require_once 'rodape.php' ?>

<script>

    $(".botao-pedido").click(function()
    {
        // console.dir(this);
        var nome = this.dataset.nome;
        var preco = this.dataset.preco;
        var pkProduto = this.dataset.pkproduto;
        setLinhaPedido(nome,preco,pkProduto);

        $("#btn-"+pkProduto).attr("disabled", true);
        $("#btn-"+pkProduto).addClass("botao-desabilitado");
    });

    function setLinhaPedido(nome,preco,pkProduto)
    {
        var $linha = $("<tr>"+
                        "<td><button class='cancelar-produto' onclick='removerProduto(this,"+pkProduto+");'><i class='fas fa-minus-circle remover-produto-icone'></i></button></td>"+
                        "<td class='pkProduto-tabela' style='display:none'>"+pkProduto+"</td>"+
                        "<td>"+nome+"</td>"+
                        "<td>"+preco+"</td>"+
                        "<td class='preco-tabela' id=tdPreco"+pkProduto+">"+preco+"</td>"+
                        "<td class='quantidade-tabela'><button class='btn btn-danger' onclick='subtrair(this,"+pkProduto+","+preco+");'>-</button><label class='quantidade'>1</label><button class='btn btn-success' onclick='adicionar(this,"+pkProduto+","+preco+");'>+</button></td>"+
                    "</tr>");
        $("#tabelaPedido tbody:last-child").append($linha);

        calcularValorTotalPedido();
    }

    function adicionar(elemento,pkProduto,preco)
    {
        console.log(elemento,$(elemento));
        var quantidade = parseFloat($(elemento).prev().text());
        var precoTotal;
        quantidade++;
        $(elemento).prev().text(quantidade);
        precoTotal = preco*quantidade;
        $("#tdPreco"+pkProduto).text(precoTotal);

        calcularValorTotalPedido();
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

            calcularValorTotalPedido();
        }
    }

    function removerProduto(elemento,pkProduto)
    {
        $(elemento).closest("tr").empty();
        $("#btn-"+pkProduto).attr("disabled", false);
        $("#btn-"+pkProduto).removeClass("botao-desabilitado");

        calcularValorTotalPedido();
    }

    function calcularValorTotalPedido()
    {
        var precoProduto, total = 0;
        var $row = $(".tabela-pedido > .table > tbody > tr");       
        $tds = $row.find(".preco-tabela");             

        $.each($tds, function()
        {      
            precoProduto = parseFloat($(this).text());
            total = total + precoProduto;        
        });

        $("#ctPrecoTotal").val(total);
    }
    
    $("#btnLimpar").click(function()
    {
        $(".tabela-pedido > .table > tbody").empty();
        $(".botao-content button").attr("disabled", false);
        $(".botao-content button").removeClass("botao-desabilitado");
        $("#ctPrecoTotal").val(0);
    });

    $("#btnFinalizar").click(function()
    {
        var pedido = {};
        var listaProdutos = [];

        var $row = $(".tabela-pedido > .table > tbody > tr");    
        var $body = $(".tabela-pedido > .table > tbody");         
        var quantidadeLinhas = $row.find(".preco-tabela").length;

        pkUsuario = $("#cbAtendente option:selected").val();
        pkPagamento = $("#cbPagamento option:selected").val();
        precoTotalPedido = $("#ctPrecoTotal").val();

        pedido.pkUsuario = pkUsuario;
        pedido.pkPagamento = pkPagamento;
        pedido.precoTotalPedido = precoTotalPedido;
        
        for(var i=0; i<quantidadeLinhas; i++)
        {
            produto = {};
            linhaPreco = $row.find(".preco-tabela")[i];
            linhaQuantidade = $row.find(".quantidade")[i];
            linhaPkProduto = $row.find(".pkProduto-tabela")[i];
            
            produto.preco = parseFloat($(linhaPreco).text());
            produto.quantidade = parseFloat($(linhaQuantidade).text());
            produto.pkProduto = parseFloat($(linhaPkProduto).text());

            listaProdutos.push(produto);
        }
        pedido.listaProdutos = listaProdutos;

        if(listaProdutos.length>0)
        {
            $.ajax(
            {
                url: "lancar-pedido-post.php", 
                type : 'post',
                data: { pedido: pedido },
                success: function(result)
                {
                    $(".tabela-pedido > .table > tbody").empty();
                    $(".botao-content button").attr("disabled", false);
                    $(".botao-content button").removeClass("botao-desabilitado");
                    $("#ctPrecoTotal").val(0);
                }
            });
        }
        else
        { alert("É necessário pelo menos um produto para lançar o pedido");}
    });

</script>