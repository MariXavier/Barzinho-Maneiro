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
            
            $query = "SELECT p.*, c.nome AS categoriaProduto, a.caminho FROM produto AS p 
            JOIN categoria AS c 
            ON p.fkCategoria = c.pkCategoria
            JOIN anexo AS a
            ON p.fkAnexo = a.pkAnexo";

            $resultado = $conexao -> query($query);
            $lista = $resultado -> fetchAll();
            return $lista;
        }

        public function listarUnicoProduto($pkProduto)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = 
            "SELECT p.*, c.nome AS categoriaProduto, a.caminho AS anexoNome FROM produto AS p 
            JOIN categoria AS c 
            ON p.fkCategoria = c.pkCategoria
            JOIN anexo AS a
            ON p.fkAnexo = a.pkAnexo
            WHERE p.pkProduto = " .$pkProduto;

            $resultado = $conexao ->query($query);
            $lista = $resultado ->fetchAll();
            foreach($lista as $linha)
            {
                return $linha;
            }
        }

        public function inserirProduto($codigo, $nome, $preco, $fkCategoria, $pkAnexo)
        {
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = 
            "INSERT INTO produto (codigo, nome, preco, fkCategoria, fkAnexo) 
            VALUES ('".$codigo."', '".$nome."', ".$preco.", ".$fkCategoria.", ".$pkAnexo.")";
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

        public function isCodigoExistente($codigo)
        {   
            $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
            $query = "SELECT * FROM Produto WHERE codigo='$codigo'";

            $resultado = $conexao -> query($query);
            $lista = $resultado ->fetchAll();

            if(sizeof($lista)>0)
            {
                echo "Já existe um produto com esse código, por favor insira um código diferente";
                return true;
            }
            else
            { return false; }
        }

        public function inserirAnexoProduto($caminho)
        {
            try
            {
                $conexao = new PDO("mysql:host=127.0.0.1:3360; dbname=barzinho","root","");
                $stmt = $conexao->prepare("INSERT INTO anexo (caminho) VALUES(?)");
            
                try 
                {
                    $conexao->beginTransaction();
                    $stmt->execute(array($caminho));
                    $pkAnexo = $conexao->lastInsertId();
                    $conexao->commit();

                    return $pkAnexo;
                    
                } catch(PDOExecption $e) 
                {
                    $conexao->rollback();
                    print "Error!: " . $e->getMessage() . "</br>";
                }
            } catch( PDOExecption $e ) 
            {
                print "Error!: " . $e->getMessage() . "</br>";
            }
        }
    }
?>