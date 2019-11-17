<?php

    require_once 'classes/Usuario.php';
    
    $usuario = new Usuario();

    $loginUsuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $nome = $_POST['nomeUsuario'];
    $cpf = $_POST['cpf'];
    $tipo = $_POST['tipo'];

    $usuario -> inserirUsuario($loginUsuario, $senha, $nome, $cpf, $tipo);
    header('Location:usuarios.php');

?>




