<?php
    include_once('functions.php');
    include_once('../persistence/config.php');

    // Pega os dados do formulario
    $login = isset($_POST['login']) ? $_POST['login'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

    // Valida dados vazios
    if (empty($login) || empty($senha)) {
        echo "Informe login e senha";
        exit;
    }

    // Cria hash da senha

    // Verifica banco de dados
    $PDO = db_connect();
    $sql = "SELECT idusuario, nome FROM usuario WHERE login = '" . $login . "' AND senha = '" . $senha . "'";
    $stmt = $PDO->prepare($sql);
    $stmt->execute();
    $users = $stmt->fetchALL(PDO::FETCH_ASSOC);

    if (count($users) <= 0) {
        echo "Login e senha incorretos";
        exit;
    } else {
        // Pega o primeiro usuario
        $user = $users[0];

        session_start();
        $_SESSION['logged_in'] = true;
        $_SESSION['id'] = $user['idusuario'];
        $_SESSION['login'] = $login;
        $_SESSION['senha'] = $senha;
    }

    header('Location: ../index.php')
?>
