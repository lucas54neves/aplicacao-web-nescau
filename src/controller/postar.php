<?php
    include_once('functions.php');
    include_once('../persistence/config.php');

    // Pega os dados do formulario
    $postagem = isset($_POST['postagem']) ? $_POST['postagem'] : null;

    // Valida dados vazios
    if (empty($postagem)) {
        echo "Volte e preencha todos os campos";
        exit;
    }

    // Insere no banco de dados
    $PDO = db_connect();
    $sql = "INSERT INTO `postagem`(`usuario_idusuario`, `mensagem`) VALUES (" . $_SESSION['id'] . ",'" . $postagem . "')";
    $stmt = $PDO->prepare($sql);

    // Executa a insercao
    if ($stmt->execute()) {
        header('Location: ../view/tela-postagem.php');
    }
    else {
        echo "Erro ao cadastrar";
        print_r($stmt->errorInfo());
    }
?>
