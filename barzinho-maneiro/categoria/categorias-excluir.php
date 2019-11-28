<?php
    require_once '../classes/Categoria.php';
    $categoria = new Categoria();
    $pkCategoria = $_GET['codigo'];
    $categoria -> excluir($pkCategoria);
    header('Location:categorias.php');
?>