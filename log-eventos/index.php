<?php
require "config.php";
require_once 'historico.class.php';

$log = new Historico($pdo);

// Registrando logs
// Bom para criar log de login e ips.
$log->registrar('Entrou na página inicial');
$log->registrar('Deletou registro de mensagens');
$log->registrar(34123431432);