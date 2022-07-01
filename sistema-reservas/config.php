<?php

try {
    $pdo = new PDO("mysql:dbname=crud;host=localhost","root", "root");
} catch (PDOException $e) {
    echo "ERRO: ".$e->getMessage();
    exit;
}