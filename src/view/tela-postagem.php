<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Aplicação WEB Nescau</title>
        <link rel="icon" href="../../img/logo.jpeg">
        <link rel="stylesheet" href="../../css/master.css">
    </head>
    <body>
        <h1>Aplicação WEB Nescau</h1>
        <div id="geral">
            <div id="esquerda">
                <?php
                    include_once('../controller/functions.php');
                    include_once('../persistence/config.php');

                    echo "<h1 align='center'>Usuários</h1>";
                    echo "<table align='center'";

                    try {
                        $PDO = db_connect();
                        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $PDO->prepare("SELECT `nome` FROM `usuario` WHERE 1");
                        $stmt->execute();
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $PDO = null;
                    echo "</table>";
                ?>
            </div>
            <div id="meio">
                <?php
                    include_once('../controller/functions.php');
                    include_once('../persistence/config.php');

                    echo "<h1 align='center'>Postagens</h1>";
                    echo "<table align='center'";

                    try {
                        $PDO = db_connect();
                        $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        $stmt = $PDO->prepare("SELECT `mensagem` FROM `postagem` WHERE 1");
                        $stmt->execute();
                        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                        foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                            echo $v;
                        }
                    }
                    catch(PDOException $e) {
                        echo "Error: " . $e->getMessage();
                    }
                    $PDO = null;
                    echo "</table>";
                ?>
                <br>
                <div align='center'>
                    <form class="" action="../controller/postar.php" method="post">
                        <textarea name="postagem" cols ="30" rows="5" >Poste o deseja</textarea>
                        <br>
                        <button type="submit">Postar</button>
                    </form>
                </div>
            </div>
            <div id="direita">
                <h1 align='center'>Painel</h1>
                <div align='center'>
                    <?php
                        if (isLoggedIn()): {
                            echo "
                                <form>
                                    <button type='submit' formaction='../controller/sair.php'>Deslogar</button>
                                </form>
                                <br>
                                ";
                            $PDO = db_connect();
                            $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $PDO->prepare("SELECT `nome` FROM `usuario` WHERE `login` = '" . $_SESSION['login'] . "'");
                            $stmt->execute();
                            $users = $stmt->fetchALL(PDO::FETCH_ASSOC);
                            if (isset($users)) {
                                $user = $users[0];
                                echo $user['nome'];
                            }
                            echo "
                                <form>
                                    <button type='submit' formaction='tela-edicao.php'>Editar dados</button>
                                </form>
                                ";
                        }
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </body>
</html>
