<?php
    include_once('../persistence/connection.php');
    include_once('../persistence/usuarioDAO.php');

    // Pega os dados do formulario
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

    // Valida dados vazios
    if (empty($login) || empty($senha)) {
        echo "Informe login e senha";
        exit;
    }

    // Cria hash da senha

    $conexao = new Connection();
    $conexao = $conexao->getConnection();

    $usuarioDAO = new UsuarioDAO();
    $usuarioDAO->logar($conexao, $login, $senha);
?>
