<?php
    include_once('../controller/functions.php');

    class UsuarioDAO {
        function __construct() {}

        function cadastrar($conexao, $usuario) {
            $sql = "INSERT INTO `usuario`(`login`, `senha`, `nome`) VALUES ('" .
                $usuario->getLogin() . "','" .
                $usuario->getSenha() . "','" .
                $usuario->getNome() . "')";
            $stmt = $conexao->prepare($sql);
            return $stmt->execute();
        }

        function excluir($conexao) {
            $sql = "DELETE FROM `usuario` WHERE `idusuario` = " . $_SESSION['id'];
            $stmt = $conexao->prepare($sql);
            return $stmt->execute();
        }

        function editar($conexao, $usuario) {
            $sql = "UPDATE `usuario` SET
                    `login` = '" . $usuario->getLogin() . "',
                    `senha` = '" . $usuario->getSenha() . "',
                    `nome` = '" . $usuario->getNome() . "'
                    WHERE `idusuario` = " . $_SESSION['id'];
            $stmt = $conexao->prepare($sql);
            return $stmt->execute();
        }

        // Retorna uma tabela em HTML com todos os usuarios
        function consultar($conexao) {
            echo "<h1 align='center'>Usuários</h1>";
            echo "<table align='center'";
            try {
                $sql = "SELECT `nome` FROM `usuario` WHERE 1";
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
        }

        // Retorna verdadeiro ou falso se existe um usuario com o login e senha
        function logar($conexao, $login, $senha) {
            $sql = "SELECT idusuario, nome FROM usuario WHERE login = '" . $login . "' AND senha = '" . $senha . "'";
            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchALL(PDO::FETCH_ASSOC);

            if (count($users) <= 0) {
                echo "Login e senha incorretos";
                exit;
                header('Location: ../view/formulario_login.php');
            } else {
                // Pega o primeiro usuario
                $user = $users[0];

                // Inicia uma sessao para o usuario em questao
                session_start();
                $_SESSION['logged_in'] = true;
                $_SESSION['id'] = $user['idusuario'];
                $_SESSION['nome'] = $user['nome'];
                $_SESSION['login'] = $login;
                $_SESSION['senha'] = $senha;

                header('Location: ../index.php');
            }
        }
    }
?>
