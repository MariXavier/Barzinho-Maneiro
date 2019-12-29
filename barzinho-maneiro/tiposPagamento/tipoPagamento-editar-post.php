<?php 
    require_once '../cabecalho.php';
    require_once "../classes/TipoPagamento.php";

    $pkFormaPagamento = $_POST["pkFormaPagamento"];
    $codigo = $_POST["codigo"];
    $nome = $_POST["nome"];

    $tipoPagamento = new TipoPagamento();
    $tipoPagamento -> alterarTipoPagamento($pkFormaPagamento, $codigo, $nome);
    
    header('Location:/barzinho-maneiro/tiposPagamento/tiposPagamentos.php');
?>