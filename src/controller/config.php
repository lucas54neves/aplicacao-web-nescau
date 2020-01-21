<?php
    // Constantes do banco de dados
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'mydb');

    // Inicia as sessoes
    session_start();

    // Habilita todas as exibições de erros
    ini_set('display_errors', true);
    error_reporting(E_ALL);
?>
