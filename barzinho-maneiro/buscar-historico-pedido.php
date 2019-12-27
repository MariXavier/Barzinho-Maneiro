<?php
require_once 'classes/Pedido.php';

$data = $_POST["data"];
$funcionario = $_POST["funcionario"];

$pedido = new Pedido();

$listaPedidos = $pedido -> listarHistoricoPedido($funcionario, $data);

foreach($listaPedidos as $pedidos)
{
    echo "<tr>
            <td>".$pedidos["dataPedido"]."</td>
            <td>48</td>
            <td>Bob</td>
            <td>10,50</td>
        </tr>";
}

    
?>




