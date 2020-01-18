<?php
    include_once('controller/functions.php');
    include_once('persistence/config.php');
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Aplicação WEB Nescau</title>
        <link rel="icon" href="../img/logo.jpeg">
        <link rel="stylesheet" href="../css/master.css">
    </head>
    <body>
        <h1>Aplicação WEB Nescau</h1>
        <?php if (isLoggedIn()): ?>
            <li><a href='view/tela-edicao.php'>Tela de Edição</a></li>
            <li><a href='view/tela-postagem.php'>Tela de Postagem</a></li>
            <li><a href='controller/sair.php'>Sair</a></li>
        <?php else: ?>
            <li><a href='view/tela-login.php'>Login</a></li>
            <li><a href='view/tela-cadastro.php'>Cadastrar</a></li>
        <?php endif; ?>
    </body>
</html>
