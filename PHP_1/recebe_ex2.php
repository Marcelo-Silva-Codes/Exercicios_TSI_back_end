<?php

$nome = $_POST['nome'];
$idade = $_POST['idade'];
$cidade = $_POST['cidade'];


echo "Nome: $nome<br>";
echo "Idade: $idade<br>";

if($idade>=18){
    if(($cidade == 1) || ($cidade == 2)){
    echo"Inscrição para a Zona Sul.";
    }
    else{
        echo"Inscrição para a Capital.";
    }


}
else{
    echo "Inscrição Inválida.";
}

?>