<?php
session_start();

if((!isset($_SESSION['email'])) && (!isset($_SESSION['logado'])))
{
$_SESSION["msg"]="Preencha campos email e senha";
header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

?>

<form action="buscar.php" method="post" enctype="multipart/form-data">

<p>Busca por CPF: <input type="text" name="busca_cpf"></p>
<p>Busca por Nome:<input type ="text" name = "busca_nome"></p> 

<button type="submit" name="acao" value="editar"> Buscar </button>
<button type="submit" name="acao" value="excluir"> Limpar </button> 
</form>                                                         

<br>
<a href='index.php'>Voltar </a>