<?php
    class Pedido
    {
        public function listarHistoricoPedido($pkFuncionario, $dataInicial, $dataFinal)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");

            $query = "SELECT pp.fkPedido, pp.valorUnitario, pp.quantidade, p.dataPedido, p.precoTotal, u.nome AS nomeFuncionario, prod.nome AS nomeProduto, pag.nome AS nomePagamento FROM pedidoproduto as pp JOIN pedido as p ON pp.fkPedido = p.pkPedido join produto as prod on pp.fkProduto = prod.pkProduto join usuario as u on u.pkUsuario = p.fkUsuario join formapagamento as pag on pag.pkFormaPagamento = p.fkPagamento WHERE p.dataPedido >= '$dataInicial' AND p.dataPedido <= '$dataFinal' AND p.fkUsuario = ".$pkFuncionario." GROUP BY fkPedido";

            $resultado = $conexao -> query($query);
            $lista = $resultado -> fetchAll();
            return $lista;
        }

        public function listarProdutosDosPedidos($fkPedido)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $queryProduto = "SELECT pp.fkPedido, pp.ValorUnitario AS valorUnitario, pp.fkProduto, pp.quantidade AS quantidade, prod.nome AS nomeProduto FROM pedidoproduto as pp JOIN pedido as p ON pp.fkPedido = p.pkPedido join produto as prod on prod.pkProduto = pp.fkProduto where fkPedido = ".$fkPedido;
        
            $resultado = $conexao -> query($queryProduto);
            $lista = $resultado -> fetchAll();
            return $lista;
        }

    }
?>