<?php

// Dados para conexão com o banco de dados Mysql.
// Poderia haver um arquivo de configurações para cada tipo de banco de dados utiizado.

$db_name = 'crud'; 
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';

// Atribui a $pdo diversos métodos para realizar manipulação de banco de dados
// $pdo é um objeto
$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host,$db_user,$db_pass);

