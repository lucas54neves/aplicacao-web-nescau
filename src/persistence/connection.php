<?php
    include_once('../controller/config.php');

    class Connection {
        private $servername;
        private $username;
        private $password;
        private $dbname;
        private $conn;

        function __construct() {
            $this->servername = DB_HOST;
            $this->username = DB_USER;
            $this->password = DB_PASS;
            $this->dbname = DB_NAME;
            $this->connection = null;
        }

        function getConnection() {
            if ($this->connection == null) {
                $this->connection = new PDO('mysql:host=' . $this->servername . ';dbname=' . $this->dbname . ';charset=utf8', $this->username, "");
            }
            return $this->connection;
        }
    }
?>
