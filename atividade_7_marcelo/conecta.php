<?php
$conexao = mysqli_connect('localhost','root','1','aula',3307);// tive que colocar a porta 3307 pq eu uso a porta 3306 para outro trabalho
mysqli_set_charset($conexao,"utf8");

if (!$conexao) {
    die('Não foi possível conectar: '.mysql_error()); // função que mostra os erros de sql da conexão
}
?>