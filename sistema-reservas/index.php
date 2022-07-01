<?php

require 'config.php';
require 'classes/reservas.php';
require 'classes/carros.php';

$reservas = new Reservas($pdo);
$carros = new Carros($pdo);

?>

<h1>RESERVAS</h1>

<?php
$lista = $reservas->getReservas();

foreach($lista as $item) {

// Formatando as datas
$data1 = date('d/m/Y', strtotime($item['data_inicio']));
$data2 = date('d/m/Y', strtotime($item['data_fim']));

// Exibindo os dados
    echo $item['pessoa'].' reservou o carro '.$item['id_carro'].' entre as datas: '.$data1.' e '.$data2.'<br>';
}

?>