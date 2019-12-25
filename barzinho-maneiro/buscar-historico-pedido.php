<?php
require_once 'classes/Pedido.php';

$data = $_POST["data"];
$funcionario = $_POST["funcionario"];

$pedido = new Pedido();

$listaPedidos = $pedido -> listarHistoricoPedido($funcionario, $data);

    
?>




