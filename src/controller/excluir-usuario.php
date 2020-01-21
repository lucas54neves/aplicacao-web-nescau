<?php
    include_once('../persistence/connection.php');
    include_once('../persistence/usuarioDAO.php');

    $conexao = new Connection();
    $conexao = $conexao->getConnection();

    $usuarioDAO = new UsuarioDAO();
    if ($usuarioDAO->excluir($conexao)) {
        include("sair.php");
    }
    else {
        echo "Erro ao remover";
        print_r($stmt->errorInfo());
    }
?>
