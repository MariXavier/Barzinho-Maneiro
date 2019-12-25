<?php
    class Pedido
    {
        public function inserirPedido($pkProduto, $preco, $quantidade)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = "INSERT INTO pedido () VALUES ()";
            $conexao ->exec($query);
        }

        public function listarHistoricoPedido($pkFuncionario, $data)
        {
            $data = $data ." 23:59:59";
            echo $data;
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            
            //$query = "SELECT * FROM ";

            $resultado = $conexao -> query($query);
            $lista = $resultado -> fetchAll();
            return $lista;
        }

    }
?>