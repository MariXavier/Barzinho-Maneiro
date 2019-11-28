<?php
    require_once 'cabecalho.php';
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
        <a href="#" class="btn btn-info">Limpar</a>
        <a href="#" class="btn btn-success">Finalizar</a>
    </div>
</div>

<div class="painel-content">
    <div style="width:40%; margin-right: 20px;">
        <div style="display: flex;">
            <div class="botao-pedido">
                <div class="imagem-pedido" style="background-image: url('Imagens/hamburguer.jpg');"></div>
                <label>X-Burguer</label>
            </div> 
            <div class="botao-pedido">
                <div class="imagem-pedido" style="background-image: url('Imagens/batata.png');"></div>
                <label>Batata frita</label>
            </div> 
        </div>
        <div style="display: flex;">
            <div class="botao-pedido">
                <div class="imagem-pedido" style="background-image: url('Imagens/refrigerante.jpg');"></div>
                <label>Refrigerante</label>
            </div> 
            <div class="botao-pedido">
                <div class="imagem-pedido" style="background-image: url('Imagens/cerveja.png');"></div>
                <label>Cerveja</label>
            </div> 
        </div>
    </div>
    <div class="tabela-pedido">
        <table class="table">
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
                    <td>Batata</td>
                    <td>14</td>
                    <td>14</td>
                    <td>1</td>
                    <td><a href="#" class="btn btn-danger">-</a></td>
                    <td>1</td>
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
                    <td>Batata</td>
                    <td>14</td>
                    <td>14</td>
                    <td>1</td>
                    <td><a href="#" class="btn btn-danger">-</a></td>
                    <td>1</td>
                    <td><a href="#" class="btn btn-success">+</a></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'rodape.php' ?>


<script>
    console.log("oi");
    console.log($("#btnCancelar"));
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

    // var $row = $(".tabela-pedido > .table > tbody > tr");       // Finds the closest row <tr> 
    // $tds = $row.find("td");             // Finds all children <td> elements

    // $.each($tds, function() {               // Visits every single <td> element
    //     console.log($(this).text());        // Prints out the text within the <td>
    // });


</script>