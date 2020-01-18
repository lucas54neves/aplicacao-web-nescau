<?php
    include_once('../controller/functions.php');
    include_once('../persistence/config.php');
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="utf-8">
        <title>Aplicação WEB Nescau</title>
        <link rel="icon" href="../../img/logo.jpeg">
        <link rel="stylesheet" href="../../css/master.css">
    </head>
    <body>
        <h1>Aplicação WEB Nescau</h1>
        <h2>Tela de Login</h2>
        <?php if (isLoggedIn()): ?>
            <p>Olá, <?php echo $_SESSION['user_name']; ?>. <a href="panel.php">Painel</a> | <a href="logout.php">Sair</a></p>
        <?php else: ?>
            <p>Olá, visitante. <a href="formulario_login.php">Login</a></p>
        <?php endif; ?>
        </form>
    </body>
</html>
