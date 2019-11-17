<?php
    require_once "cabecalho.php";
    require_once "classes/Usuario.php";

    

    $pkUsuario = $_POST['pkUsuario'];
    $nome = $_POST['nomeUsuario'];
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $tipo = $_POST['tipo'];

    $usuarioObjeto = new Usuario();
    $usuarioObjeto -> alterarUsuario($usuario, $senha, $nome, $cpf, $tipo, $pkUsuario);

    header('Location:categorias.php');
?>
