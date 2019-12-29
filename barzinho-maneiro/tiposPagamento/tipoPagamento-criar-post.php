<?php
    require_once "../classes/TipoPagamento.php";
    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];

    $tipoPagamento = new TipoPagamento();
    $tipoPagamento -> inserirTipoPagamento($codigo, $nome);

    header('Location:/barzinho-maneiro/tiposPagamento/tiposPagamentos.php');
?>