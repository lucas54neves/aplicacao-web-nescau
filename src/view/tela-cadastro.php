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
        <h2>Tela de Cadastro</h2>
        <form action="../controller/cadastrar_usuario.php" method="post">
            <p>Login <input type="text" name="login"></p>
            <p>Senha <input type="password" name="senha"></p>
            <p>Nome <input type="text" name="nome"></p>
            <button type="submit">Cadastrar</button>
        </form>
    </body>
</html>
