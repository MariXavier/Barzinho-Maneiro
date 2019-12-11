<?php
    class Pedido
    {
        public function inserirPedido($pkProduto, $preco, $quantidade)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = "INSERT INTO pedido () VALUES ()";
            $conexao ->exec($query);
        }

    }
?>