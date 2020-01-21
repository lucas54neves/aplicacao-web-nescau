<?php
    class Postagem {
        private $idPostagem;
        private $idUsuario;
        private $mensagem;

        function __construct($idUsuario, $mensagem) {
            $this->idUsuario= $idUsuario;
            $this->mensagem = $mensagem;
        }

        function getIdUsuario() {
            return $this->idUsuario;
        }

        function getMensagem() {
            return $this->mensagem;
        }
    }
?>
