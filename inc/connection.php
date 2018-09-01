<?php
        $mysqli = new mysqli("localhost", "root", "", "provaP2");

        if ($mysqli->connect_error) {
                die("Erro na conexão: " . $mysqli->connect_error);
        }
?>
