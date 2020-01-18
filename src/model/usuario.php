<?php
    class Postagem {
        private $idUsuario;
        private $login;
        private $senha;
        private $nome;

        function __contruct($idUsuario, $login, $senha, $nome) {
            $this->idUsuario = $idUsuario;
            $this->login = $login;
            $this->senha = $senha;
            $this->nome = $nome;
        }

        function getIdUsuario() {
            return $this->idUsuario;
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
