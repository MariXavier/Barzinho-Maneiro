<?php
    class Usuario
    {
        public $pkUsuario;
        public $usuario;
        public $senha;
        public $nome;
        public $cpf;
        public $tipo;
        public $status;

        public function listarUsuarios()
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = "SELECT pkUsuario, nome, usuario, tipo FROM usuario";
            $resultado = $conexao -> query($query);
            $lista = $resultado -> fetchAll();
            return $lista;
        }

        public function listarUnicoUsuario($pkUsuario)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = "SELECT * FROM usuario WHERE pkUsuario = " .$pkUsuario;
            $resultado = $conexao -> query($query);
            $lista = $resultado ->fetchAll();
            foreach($lista as $linha)
            {
                return $linha;
            }
        }

        public function inserirUsuario($usuario, $senha, $nome, $cpf, $tipo)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = "INSERT INTO usuario(usuario, senha, nome, cpf, tipo) VALUES ('".$usuario."', '".$senha."', '".$nome."', '".$cpf."', ".$tipo.")";
            $conexao ->exec($query);
        }

        public function alterarUsuario($usuario, $senha, $nome, $cpf, $tipo, $pkUsuario)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = "UPDATE usuario SET usuario='".$usuario."', senha='".$senha."', nome='".$nome."', cpf='".$cpf."', tipo='".$tipo."' WHERE pkUsuario=".$pkUsuario;
            $conexao -> exec($query);
        }

        public function excluirUsuario($pkUsuario)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho", "root", "");
            $query = "DELETE FROM usuario WHERE pkUsuario=".$pkUsuario;
            $conexao -> exec($query);
        }
    }
?>