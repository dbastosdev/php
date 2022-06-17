<?php

/*

A ideia é numa mesma página de exibição de resultados, atualizar os limites de mínimo + 10 resultados para cada
link disponível na página. 

*/

// Conexão com o banco de dados

$db_name = 'crud'; 
$db_host = 'localhost';
$db_user = 'root';
$db_pass = 'root';

// Atribui a $pdo diversos métodos para realizar manipulação de banco de dados
$pdo = new PDO("mysql:dbname=".$db_name.";host=".$db_host,$db_user,$db_pass);

// Query de busca no banco de dados

// Limitadores iniio e quantidade de resultados

// Ponto de partida dos resultados
$inicio = 0;

// Atualiza o início da paginação
$inicio = $_GET['inicio'];

// Quantidade de resultados por página
$qResultados = 2;

// Pegando a quantidade de registros a serem exibidos e determinando o número de páginas
$total = 0;
$sql = "SELECT COUNT(*) AS c FROM usuario"; // quantidade de registros
$sql = $pdo->query($sql);
$sql = $sql->fetch();
// quantidade de páginas
$paginas = $sql['c'] / $qResultados;





$sql = "SELECT * FROM usuario LIMIT $inicio, $qResultados";
$sql = $pdo->query($sql);

if($sql->rowCount() > 0){
    foreach($sql->fetchAll() as $item){
        echo $item['id'].' - '.$item['nome'].'<br>';
    }
}

echo "<hr/>";
echo "Total de páginas: ".$paginas;
echo "<hr/>";
// link para páginas - para cada link, eu atualizo o início, ou seja o ponto de partida dos registros
for($i = 0; $i < $paginas; $i++){
    echo '<a href="./?inicio='.($i).'">'.'['.($i+1).']'.'</a>';
}