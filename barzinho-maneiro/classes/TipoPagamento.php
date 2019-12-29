<?php 
    class TipoPagamento
    {
        public function inserirTipoPagamento($codigo, $nome)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
    
            $query = "INSERT INTO formaPagamento (codigo, nome) VALUES ('$codigo', '$nome')";
            $conexao ->exec($query);
        }

        public function listarTipoPagamentos()
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
    
            $query = "SELECT * FROM formaPagamento";
            $resultado = $conexao -> query($query);
            $lista = $resultado -> fetchAll();
            return $lista;
        }

        public function listarUnicoTipoPagamentos($pkFormaPagamento)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
    
            $query = "SELECT * FROM formaPagamento WHERE pkFormaPagamento = ".$pkFormaPagamento;
            $resultado = $conexao -> query($query);
            $lista = $resultado -> fetchAll();
            foreach($lista as $linha)
            {
                return $linha;
            }
        }

        public function deletarTipoPagamento($pkFormaPagamento)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
    
            $query = "DELETE FROM formaPagamento WHERE pkFormaPagamento = ".$pkFormaPagamento;
            $conexao ->exec($query);
        }

        public function alterarTipoPagamento($pkFormaPagamento, $codigo, $nome)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
    
            $query = "UPDATE formaPagamento SET nome = '$nome', codigo = '$codigo' WHERE pkFormaPagamento = ".$pkFormaPagamento;
            $conexao ->exec($query);
        }
    }
?>