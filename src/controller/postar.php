<?php
    include_once('functions.php');
    include_once('../persistence/connection.php');
    include_once('../persistence/postagemDAO.php');
    include_once('../model/postagem.php');

    // Pega os dados do formulario
    $mensagem = isset($_POST['postagem']) ? $_POST['postagem'] : null;

    // Valida dados vazios
    if (empty($mensagem)) {
        echo "Volte e preencha todos os campos";
        exit;
    }

    $conexao = new Connection();
    $conexao = $conexao->getConnection();

    $postagem = new Postagem($_SESSION['id'], $mensagem);

    // Insere no banco de dados
    $postagemDAO = new PostagemDAO();
    if ($postagemDAO->cadastrar($conexao, $postagem)) {
        header('Location: ../view/tela-postagem.php');
    }
    else {
        echo "Erro ao cadastrar";
        header('Location: ../index.php');
    }
?>
