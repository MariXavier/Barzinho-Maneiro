<?php
    require_once 'cabecalho.php';
    require_once 'classes/Produto.php';

    $produto = new Produto();
    $listaProdutos = $produto -> listarProdutos();
?>

<h2>Lançar pedido</h2>
<div class="linha-base-pedido">
    <div>
        <label for="nome">Comanda</label>
        <input type="text" name="comanda" class="form-control" required>
    </div>
    <div>
        <label for="nome">Atendente</label>
        <input type="text" name="atendente" class="form-control" required>
    </div>
    <div>
        <label for="nome">Total</label>
        <input type="text" name="total" class="form-control" disabled>
    </div>
    <div class="conjunto-botao-pedido">
        <div id="btnCancelar" click=funcaoNova class="btn btn-danger">Cancelar</div>
        <a href="#" class="btn btn-info" id="btnLimpar">Limpar</a>
        <a href="#" class="btn btn-success">Finalizar</a>
    </div>
</div>

<div class="painel-content">
    <div class="botao-content">
        <?php 
            foreach($listaProdutos as $prod)
            {  
        ?>
                <div class="botao-pedido" id="<?php echo $prod["codigo"]; ?>">
                    <div class="imagem-pedido" style="background-image: url('Imagens/hamburguer.jpg');"></div>
                    <label><?php echo $prod["nome"]; ?></label>
                </div> 
                
        <?php
            }
        ?>
    </div>
    <div class="tabela-pedido">
        <table class="table" id="tabelaPedido">
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Preço unitário</th>
                    <th>Preço total</th>
                    <th>Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>X-Burguer</td>
                    <td>10,90</td>
                    <td>21,80</td>
                    <td>2</td>
                    <td><a href="#" class="btn btn-danger">-</a></td>
                    <td>2</td>
                    <td><a href="#" class="btn btn-success">+</a></td>
                </tr>
                <tr>
                    <td>Batata</td>
                    <td>14</td>
                    <td>14</td>
                    <td>1</td>
                    <td><a href="#" class="btn btn-danger">-</a></td>
                    <td>1</td>
                    <td><a href="#" class="btn btn-success">+</a></td>
                </tr>
                <tr>
                    <td>Refrigerahte</td>
                    <td>4</td>
                    <td>8</td>
                    <td>2</td>
                    <td><a href="#" class="btn btn-danger">-</a></td>
                    <td>2</td>
                    <td><a href="#" class="btn btn-success">+</a></td>
                </tr>
                <tr>
                    <td>Cerveja</td>
                    <td>6</td>
                    <td>18</td>
                    <td>3</td>
                    <td><a href="#" class="btn btn-danger">-</a></td>
                    <td>3</td>
                    <td><a href="#" class="btn btn-success">+</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'rodape.php' ?>

<script>

    $("#btnLimpar").click(function()
    {
        console.log("clicka");
        $(".tabela-pedido > .table > tbody").empty();
    });

    $(".tabela-pedido > .table > tbody > tr").click(function()
    {
        $tds = $(this).find("td");
        var vetor = [];

        $.each($tds, function() 
        {               // Visits every single <td> element
            vetor.push($(this).text());
             // Prints out the text within the <td>
        });
        console.log(vetor);   
    });

    $(".botao-pedido").click(function()
    {
        console.log(this.id);  
        $.ajax({url: "demo_test.txt", success: function(result){
            $("#div1").html(result);
        }});

    });

    function setLinhaPedido()
    {

        var $linha = $("<tr>"+
                        "<td>X-Burguer</td>"+
                        "<td>10,90</td>"+
                        "<td>10,90</td>"+
                        "<td>1</td>"+
                        "<td><a href='#' class='btn btn-danger'>-</a></td>"+
                        "<td>1</td>"+
                        "<td><a href='#' class='btn btn-success'>+</a></td>"+
                    "</tr>");
    }

    $("#btnXBurguer").click(function()
    {
        console.log("click");   
        var $linha = $("<tr>"+
                        "<td>X-Burguer</td>"+
                        "<td>10,90</td>"+
                        "<td>10,90</td>"+
                        "<td>1</td>"+
                        "<td><a href='#' class='btn btn-danger'>-</a></td>"+
                        "<td>1</td>"+
                        "<td><a href='#' class='btn btn-success'>+</a></td>"+
                    "</tr>");
        $("#tabelaPedido > tbody:last-child").append($linha);
    });
    

    // var $row = $(".tabela-pedido > .table > tbody > tr");       // Finds the closest row <tr> 
    // $tds = $row.find("td");             // Finds all children <td> elements

    // $.each($tds, function() {               // Visits every single <td> element
    //     console.log($(this).text());        // Prints out the text within the <td>
    // });


</script>