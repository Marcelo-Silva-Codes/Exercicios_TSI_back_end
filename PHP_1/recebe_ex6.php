<?php

if( isset($_GET['nome']) && isset($_GET['n1']) && isset($_GET['n2']) && isset($_GET['n3']) ){
    $nome = $_GET['nome'];
    $n1 = floatval($_GET['n1']);
    $n2 = floatval($_GET['n2']);
    $n3 = floatval($_GET['n3']);
    $media = ($n1 + $n2 + $n3) / 3;

    echo "O aluno $nome obteve a média $media";

    } else {
    echo "Algum campo não foi preenchido";
}
?>