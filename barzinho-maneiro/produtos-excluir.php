<?php
    require_once 'cabecalho.php';
    require_once 'classes/Produto.php';

    $pkProduto = $_GET['codigo'];
    $produto = new Produto();
    $produto -> deletarProduto($pkProduto);
    header("Location:produtos.php");
?>
