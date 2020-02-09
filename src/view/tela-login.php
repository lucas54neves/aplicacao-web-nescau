<?php
    include_once('../controller/functions.php');
    include_once('../controller/config.php');
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
        <h2>Tela de Login</h2>
        <?php if (isLoggedIn()): {?>
            <p>Olá, <?php echo $_SESSION['nome']; ?></p>
            <form>
                <button type='submit' formaction='tela-postagem.php'>Área de postagem</button>
            </form>
            <br>
            <form>
                <button type='submit' formaction='../controller/sair.php'>Sair</button>
            </form>
        <?php } else: ?>
            <p>Olá, visitante.</p>
            <form>
                <button type='submit' formaction='formulario_login.php'>Login</button>
            </form>
        <?php endif; ?>
        </form>
    </body>
</html>
