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
        <?php if (isLoggedIn()): {?>
            <form>
                <button type='submit' formaction='view/tela-edicao.php'>Editar dados</button>
            </form>
            <br>
            <form>
                <button type='submit' formaction='view/tela-postagem.php'>Área de postagem</button>
            </form>
            <br>
            <form>
                <button type='submit' formaction='controller/sair.php'>Deslogar</button>
            </form>
        <?php } else: ?>
            <form>
                <button type='submit' formaction='view/tela-login.php'>Logar</button>
            </form>
            <br>
            <form>
                <button type='submit' formaction='view/tela-cadastro.php'>Cadastrar</button>
            </form>
        <?php endif; ?>
    </body>
</html>
