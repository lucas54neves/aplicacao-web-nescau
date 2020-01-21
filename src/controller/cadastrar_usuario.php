<?php
    include_once('../persistence/connection.php');
    include_once('../persistence/usuarioDAO.php');
    include_once('../model/usuario.php');

    // Pega os dados do formulario
    $login = isset($_POST['login']) ? $_POST['login'] : null;
    $senha = isset($_POST['senha']) ? $_POST['senha'] : null;
    $nome = isset($_POST['nome']) ? $_POST['nome'] : null;

    // Valida dados vazios
    if (empty($login) || empty($senha) || empty($nome)) {
        echo "Volte e preencha todos os campos";
        exit;
    }

    // Cria conexao com banco de dados
    $conexao = new Connection();
    $conexao = $conexao->getConnection();

    // Cria o objeto com os dados
    $usuario = new Usuario($login, $senha, $nome);

    // Insere no banco de dados
    $usuarioDAO = new UsuarioDAO();
    if ($usuarioDAO->cadastrar($conexao, $usuario)) {
        header('Location: ../index.php');
    }
    else {
        echo "Erro ao cadastrar";
    }
?>
