
<?php

    $pedido = $_POST['pedido'];

    //insere pedido
    $precoTotal = $pedido["precoTotalPedido"];
    $data = date("Y-m-d H:i:s"); 
    $pkUsuario = $pedido["pkUsuario"];
    $pkPagamento = $pedido["pkPagamento"];
    
    try
    {
        $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
        $stmt = $conexao->prepare("INSERT INTO pedido (precoTotal, dataPedido, fkUsuario, fkPagamento) VALUES(?,?,?,?)");
    
        try 
        {
            $conexao->beginTransaction();
            $stmt->execute( array($precoTotal, $data, $pkUsuario, $pkPagamento));
            $pkPedido = $conexao->lastInsertId();
            $conexao->commit();
            
        } catch(PDOExecption $e) 
        {
            $conexao->rollback();
            print "Error!: " . $e->getMessage() . "</br>";
        }
    } catch( PDOExecption $e ) 
    {
        print "Error!: " . $e->getMessage() . "</br>";
    }

    if($pkPedido != 0) //insere pedidoProduto
    {
        print_r($pedido["listaProdutos"]);
        for($i=0; $i<count($pedido["listaProdutos"]); $i++)
        {
            $produto = $pedido["listaProdutos"][$i];
            $pkProduto = $produto["pkProduto"];
            $valorUnitario = $produto["preco"];
            $quantidade = $produto["quantidade"];

            $query = "INSERT INTO pedidoProduto(fkPedido, fkProduto, valorUnitario, quantidade) VALUES (".$pkPedido.", ".$pkProduto.", ".$valorUnitario.", ".$quantidade.")";
            $conexao ->exec($query);
        }
    }
?>