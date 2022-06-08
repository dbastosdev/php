<?php

require_once 'config.php';
require_once 'dao/UsuarioDaoMySql.php';
$usuarioDao = new UsuarioDaoMySql($pdo);

$id = filter_input(INPUT_GET, 'id');
echo "id do usuario".$id_user;

if($id){
    $usuarioDao->delete($id);
    header("Location: index.php");
    exit;
} else {
    header("Location: index.php");
    exit;
}