<?php
require_once 'classes/Pedido.php';

$data = $_POST["data"];
$pkFuncionario = $_POST["pk"];

$dataInicial = $data ." 00:00:01";
$dataFinal = $data ." 23:59:59";

$pedidoObj = new Pedido();
$listaPedidos = $pedidoObj -> listarHistoricoPedido($pkFuncionario, $dataInicial, $dataFinal);
$row = "";

if(sizeof($listaPedidos) > 0)
{
    foreach($listaPedidos as $pedido)
    {
        $listaProduto = $pedidoObj -> listarProdutosDosPedidos($pedido['fkPedido']);
        $rowProduto = "";

        foreach($listaProduto as $produto)
        {
            $rowProduto = $rowProduto .$produto["quantidade"]."x ". $produto["nomeProduto"] . " (R$ ".$produto["valorUnitario"].")" ."<br>";
        }

        $row .= "<tr>
                    <td style='text-align: center;'>".$pedido['fkPedido']."</td>
                    <td style='text-align: center;'>".$pedido['dataPedido']."</td>
                    <td style='text-align: center;'>".$pedido['nomeFuncionario']."</td>
                    <td style='text-align: left;'>".$rowProduto."</td>
                    <td style='text-align: center;'>".$pedido['nomePagamento']."</td>
                    <td>".$pedido['precoTotal']."</td>
                </tr>";
    }
    
}
echo $row;

?>




