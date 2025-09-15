<?php

if( isset($_POST['op']) && !empty($_POST['op'])){
$op = $_POST['op'];

foreach($op as $valor){

if($valor == 1){
    echo "PHP <br>";
}
if($valor == 2){
    echo "JavaScript <br>";
}
if($valor == 3){
    echo "C# <br>";
}

}

} else {
    echo "Nenhum valor selecionado";
}
?>