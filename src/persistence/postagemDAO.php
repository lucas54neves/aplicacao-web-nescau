<?php
    include_once('../controller/functions.php');

    class PostagemDAO {
        function __construct() {}

        function cadastrar($conexao, $postagem) {
            $sql = "INSERT INTO `postagem`(`usuario_idusuario`, `mensagem`) VALUES ('" .
                $postagem->getIdUsuario() . "','" .
                $postagem->getMensagem() . "')";
            $stmt = $conexao->prepare($sql);
            return $stmt->execute();
        }

        // Retorna uma tabela em HTML com todas as postagens
        function consultar($conexao) {
            echo "<h1 align='center'>Postagens</h1>";
            echo "<div class='rolagem'>";
                echo "<table align='center'";
                try {
                    $sql = "SELECT `mensagem` FROM `postagem` WHERE 1";
                    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $stmt = $conexao->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
                    foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
                        echo $v;
                    }
                }
                catch(PDOException $e) {
                    echo "Error: " . $e->getMessage();
                }
                $conexao = null;
                echo "</table>";
            echo "</div>";
        }
    }
?>
