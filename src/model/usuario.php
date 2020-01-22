<?php
    include_once('../controller/functions.php');

    class Usuario {
        private $login;
        private $senha;
        private $nome;

        function __construct($login, $senha, $nome) {
            $this->login = $login;
            $this->senha = make_hash($senha);
            $this->nome = $nome;
        }

        function getLogin() {
            return $this->login;
        }

        function getSenha() {
            return $this->senha;
        }

        function getNome() {
            return $this->nome;
        }
    }
?>
