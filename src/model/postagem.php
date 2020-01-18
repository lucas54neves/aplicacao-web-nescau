<?php
    class Postagem {
        private $idPostagem;
        private $idUsuario;
        private $mensagem;

        function __contruct($idPostagem, $idUsuario, $mensagem) {
            $this->idPostagem = $idPostagem;
            $this->idUsuario= $idUsuario;
            $this->mensagem = $mensagem;
        }

        function getIdPostagem() {
            return $this->idPostagem;
        }

        function getIdUsuario() {
            return $this->idUsuario;
        }

        function getMensagem() {
            return $this->mensagem;
        }
    }
?>
