<?php
    include_once('../persistence/connection.php');
    include_once('../persistence/usuarioDAO.php');
    include_once('config.php');

    $conexao = new Connection();
    $conexao = $conexao->getConnection();

    $usuarioDAO = new UsuarioDAO();
    if ($usuarioDAO->excluir($conexao)) {
        include("sair.php");
    }
    else {
        include("../view/tela-erro-exclusao.php");
    }
?>
