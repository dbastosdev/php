
<?php

/*
* Função somar
* 
* Esta função vai somar um valor X a um valor Y
*
* @package Controle de estoque
* @autor Douglas Bastos <dbastos.dev@gmail.com> 
*
* @param $x float é o primeiro valor a ser somado
* @param $y float é o segundo valor a ser somado
*
* @return float
*
*/

function soma($x, $y) {
    return $x + $y;
}

echo "A soma de 5 + 2 = ".soma(5,2);