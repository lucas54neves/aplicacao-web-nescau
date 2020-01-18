<?php
    include_once('../controller/functions.php');
    include_once('../persistence/config.php');

    // Pega os valores do formulario
    $login = isset($_POST['login']) ? $_POST['login'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;

    // Valida dados vazios
    if (empty($login) || empty($senha) || empty($nome)) {
        echo "Volte e preencha todos os campos";
        exit;
    }

    // Atualiza banco de dados
    $PDO = db_connect();
    $sql = "UPDATE `usuario` SET `login` = :login,`senha` = :senha,`nome` = :nome WHERE `login` = :login";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':nome', $nome);
    echo($sql);

    if ($stmt->execute()) {
        header('Location: ../index.php');
    }
    else {
        echo "Erro ao alterar";
        print_r($stmt->errorInfo());
    }
?>
