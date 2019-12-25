<?php
    require_once 'cabecalho.php';
    require_once 'classes/Produto.php';
    $codigo = $_POST['codigo'];
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];

    $produto = new Produto();
    $codigoIgual = $produto -> isCodigoExistente($codigo);
    
    if($codigoIgual == false) 
    { 
        if(isset($_POST['submit']))
        {
            if(isset($_FILES['file']))
            {
                $pasta = 'C:/xampp/htdocs/barzinho-maneiro/imagens/'; 
                $path = $pasta.$_FILES['file']['name'];
                
                if(move_uploaded_file($_FILES['file']['tmp_name'], $path))  
                {  
                    $caminhoBD = '/barzinho-maneiro/imagens/'.$_FILES['file']['name'];
                    $pkAnexo = $produto -> inserirAnexoProduto($caminhoBD);
                    echo $pkAnexo;
                    if($pkAnexo != 0)
                    {
                        $produto -> inserirProduto($codigo, $nome, $preco, $categoria, $pkAnexo); 
                        header('Location:produtos.php');
                    }
                } 
                else                                                        
                { echo "Erro salvando a imagem"; }
            }
            else 
            {  echo "Imagem inválida"; return false; }
        }

    }


    
?>