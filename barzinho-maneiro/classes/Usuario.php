<?php
    class Usuario
    {
        public $pkUsuario;
        public $usuario;
        public $senha;

        public function listarUsuarios()
        {
            $conexao = new PDO("mysql:host=127.0.0.1; dbname=barzinho","root","");
            $query = "SELECT pkUsuario, usuario, senha FROM usuario";
            $resultado = $conexao -> query($query);
            $lista = $resultado -> fetchAll();
            return $lista;
        }

        public function inserirUsuario($usuario, $senha)
        {
            $conexao = new PDO("mysql:host=127.0.0.1; dbname=barzinho","root","");
            $query = "INSERT INTO usuario(usuario, senha) VALUES ('".$usuario."', '".$senha."')";
            $conexao ->exec($query);
        }
    }
?>