<?php
    $dbHost = 'localhost';
    $dbUsername = 'root';
    $dbPassword = 'juca';
    $dbName = 'loja';

    $conexao = new mysqli ($dbHost, $dbUsername, $dbPassword, $dbName);

    if($conexao->connect_error){
        echo "erro";
    } else {
        echo "conexao com sucesso";
    }
?>