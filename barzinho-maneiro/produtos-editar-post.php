<?php
    require_once 'cabecalho.php';
    require_once 'classes/Produto.php';

    $pkProduto = $_POST['pkProduto'];
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    $produto = new Produto();
    $produto -> alterarProduto($pkProduto, $codigo, $nome, $preco, $categoria);

    header('Location:produtos.php');
?>
