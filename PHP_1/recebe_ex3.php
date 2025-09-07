<?php

$nome_usuario = $_POST['nome_usuario'];
$nome_livro = $_POST['nome_livro'];
$tipo = $_POST['tipo'];

echo"Nome do usuário: $nome_usuario <br> Nome do Livro: $nome_livro <br>";
echo"Data Atual: ";
echo date("d/m/Y H:i:s");
echo"<br>";
echo"Data de Devolução: ";
if($tipo ==1){
echo date("d/m/Y H:i:s", strtotime("+14 days")); 
}
else{
echo date("d/m/Y H:i:s", strtotime("+7 days"));
}


?>