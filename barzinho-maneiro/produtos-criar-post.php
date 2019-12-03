<?php
    require_once 'cabecalho.php';
    require_once 'classes/Produto.php';
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    $produto = new Produto();
    $codigoIgual = $produto -> isCodigoExistente($codigo);

    if($codigoIgual == false) 
    { 
        $produto -> inserirProduto($codigo, $nome, $preco, $categoria); 
        header('Location:produtos.php');
    }
?>