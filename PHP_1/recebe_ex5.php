<?php

if( isset($_POST['op']) && !empty($_POST['op'])){
$op = $_POST['op'];

foreach($op as $valor){

switch ($valor) {
    case '1':
        echo"PHP";
        break;
    
    case '2':
        echo"JavaScript";
        break;
    
    case '3':
        echo"C#";
        break;
}
}
}
?>