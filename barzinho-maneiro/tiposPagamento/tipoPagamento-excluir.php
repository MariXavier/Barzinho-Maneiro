<?php
    require_once "../classes/TipoPagamento.php";
    $codigo = $_GET["codigo"];

    $tipoPagamento = new TipoPagamento();
    $tipoPagamento -> deletarTipoPagamento($codigo);

    header('Location:/barzinho-maneiro/tiposPagamento/tiposPagamentos.php');
?>