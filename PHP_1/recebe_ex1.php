<?php

$h = $_POST['altura'];

$sexo = $_POST['sexo'];

if($sexo==1){
    $pesoideal = (62.1*$h) - 44.7;
}
else{
    $pesoideal = (72.7*$h) - 58;
}
echo "O peso ideal é: $pesoideal";

?>