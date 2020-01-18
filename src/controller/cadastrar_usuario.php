<?php
    include_once('functions.php');
    include_once('../persistence/config.php');

    // Pega os dados do formulario
    $login = isset($_POST['login']) ? $_POST['login'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;

    // Valida dados vazios
    if (empty($login) || empty($senha) || empty($nome)) {
        echo "Volte e preencha todos os campos";
        exit;
    }

    // Insere no banco de dados
    $PDO = db_connect();
    $sql = "INSERT INTO `usuario`(`login`, `senha`, `nome`) VALUES (:login, :senha, :nome)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':login', $login);
    $stmt->bindParam(':senha', $senha);
    $stmt->bindParam(':nome', $nome);

    // Executa a insercao
    if ($stmt->execute()) {
        header('Location: ../index.php');
    }
    else {
        echo "Erro ao cadastrar";
        print_r($stmt->errorInfo());
    }
?>
