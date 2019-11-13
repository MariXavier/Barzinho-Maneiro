<?php

    class Categoria
    {
        public $pkCategoria;
        public $nome;

        public function listar()
        {
            $query = "SELECT pkCategoria, nome FROM categoria";
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $resultado = $conexao ->query($query);
            $lista = $resultado ->fetchAll();
            return $lista;
        }

        public function inserir($nomeCategoria)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = "INSERT INTO categoria(nome) VALUES ('".$nomeCategoria."')";
            $conexao ->exec($query);
        }

        public function alterar($pkCategoria, $nome)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = "UPDATE categoria SET nome='".$nome."' WHERE pkCategoria = ".$pkCategoria;
            $conexao ->exec($query);
        }

        public function excluir($pkCategoria)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = "DELETE FROM categoria WHERE pkCategoria=".$pkCategoria;
            $conexao ->exec($query);

        }

        public function listarUnicaCategoria($pkCategoria)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = "SELECT pkCategoria, nome FROM categoria WHERE pkCategoria = ".$pkCategoria;
            $resultado = $conexao ->query($query);
            $lista = $resultado ->fetchAll();
            foreach($lista as $linha)
            {
                return $linha;
            }
        }
    }

?>
