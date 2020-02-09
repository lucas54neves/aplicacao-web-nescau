<?php
    include_once('../controller/functions.php');
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Aplicação WEB Nescau</title>
        <link rel="icon" href="../img/logo.jpeg">
        <link rel="stylesheet" href="../css/master.css">
    </head>
    <body class="geral">
        <h1>Aplicação WEB Nescau</h1>
        <h2>Tela de Edição</h2>
        <form action="../controller/editar-usuario.php" method="post">
            <p>Login <input type="text" name="login"></p>
            <p>Senha <input type="password" name="senha"></p>
            <p>Nome <input type="text" name="nome"></p>
            <button type="submit">Editar</button>
        </form>
    </body>
</html>
