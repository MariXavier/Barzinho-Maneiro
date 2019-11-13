<?php
require_once 'classes/Categoria.php';

$categoria = new Categoria();

$nome = $_POST['nome'];
$pkCategoria = $_POST['pkCategoria'];

$categoria -> alterar($pkCategoria, $nome);
header('Location:categorias.php');
    
?>