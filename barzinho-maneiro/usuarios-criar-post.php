<?php

    require_once 'classes/Usuario.php';
    
    $usuario = new Usuario();

    $loginUsuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $usuario -> inserirUsuario($loginUsuario, $senha);
    header('Location:usuarios.php');

?>




