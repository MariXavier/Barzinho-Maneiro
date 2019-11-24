<?php 
    require_once 'classes/Usuario.php';
    $usuario = new Usuario();
    $pkUsuario = $_GET['codigo'];
    $usuario -> excluirUsuario($pkUsuario);
    header('Location:usuarios.php');
?>