<?php
    require_once 'cabecalho.php';
?>

<h2>Lançar pedido</h2>
<div class="row">
    <div class="col-xs-4">
        <label for="nome">Comanda</label>
        <input type="text" name="comanda" class="form-control" required>
    </div>
    <div class="col-xs-4">
        <label for="nome">Atendente</label>
        <input type="text" name="atendente" class="form-control" required>
    </div>
    <div class="col-xs-4">
        <label for="nome">Total</label>
        <input type="text" name="total" class="form-control" disabled>
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
            </tbody>
        </table>
    </div>
</div>

<?php require_once 'rodape.php' ?>

