<?php

if(isset($_POST['numero'])){
    $numero = $_POST['numero'];

    if($numero < 0){
        echo"O número inserido é negativo.";
    }
    else{
        $soma=0;
        for($i=0; $i<=$numero; $i++){
            $soma += $i;
        }
        echo"A soma de todos os numeros é: $soma";
    }
}
?>