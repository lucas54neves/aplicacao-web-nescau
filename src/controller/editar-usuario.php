<?php
    include_once('../controller/functions.php');
    include_once('../controller/config.php');
    include_once('../model/usuario.php');
    include_once('../persistence/connection.php');
    include_once('../persistence/usuarioDAO.php');

    // Pega os valores do formulario
    $login = isset($_POST['login']) ? $_POST['login'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;

    // Valida dados vazios
    if (empty($login) || empty($senha) || empty($nome)) {
        echo "<script>alert('Volte e preencha todos os campos')</script>";
        header('Location: ../view/tela-edicao.php');
        exit;
    }

    // Cria um objeto com os dados
    $usuarioNovo = new Usuario($login, $senha, $nome);

    // Cria uma conexao com o banco de dados
    $conexao = new Connection();
    $conexao = $conexao->getConnection();

    // Tenta realizar a edicao
    $usuarioDAO = new UsuarioDAO();
    if ($usuarioDAO->editar($conexao, $usuarioNovo)) {
        header('Location: ../index.php');
    }
    else {
        echo "Erro ao alterar";
        print_r($stmt->errorInfo());
    }
?>
