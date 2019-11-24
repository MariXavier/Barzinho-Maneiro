<?php
    class Produto
    {
        public $pkProduto;
        public $codigo;
        public $nome;
        public $preco;
        public $fkCategoria;

        public function listarProdutos()
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = 
            "SELECT p.*, c.nome AS categoriaProduto FROM produto AS p 
            JOIN categoria AS c 
            WHERE p.fkCategoria = c.pkCategoria";

            $resultado = $conexao -> query($query);
            $lista = $resultado -> fetchAll();
            return $lista;
        }

        public function listarUnicoProduto($pkProduto)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = 
            "SELECT p.*, c.nome AS categoriaProduto FROM produto AS p 
            JOIN categoria AS c 
            WHERE p.pkProduto = ".$pkProduto." AND p.fkCategoria = c.pkCategoria";

            $resultado = $conexao ->query($query);
            $lista = $resultado ->fetchAll();
            foreach($lista as $linha)
            {
                return $linha;
            }
        }

        public function inserirProduto($codigo, $nome, $preco, $fkCategoria)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = 
            "INSERT INTO produto (codigo, nome, preco, fkCategoria) 
            VALUES ('".$codigo."', '".$nome."', ".$preco.", ".$fkCategoria.")";
            $conexao ->exec($query);
        }

        public function alterarProduto($pkProduto, $codigo, $nome, $preco, $fkCategoria)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = 
            "UPDATE produto SET codigo='".$codigo."', nome='".$nome."', preco='".$preco."', fkCategoria='".$fkCategoria."'  
            WHERE pkProduto =" .$pkProduto;
            $conexao ->exec($query);
        }

        public function deletarProduto($pkProduto)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = "DELETE FROM produto WHERE pkProduto = ".$pkProduto;
            $conexao ->exec($query);
        }
    }
?>