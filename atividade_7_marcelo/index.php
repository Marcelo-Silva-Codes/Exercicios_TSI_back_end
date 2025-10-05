<?php
session_start();

if((!isset($_SESSION['email'])) && (!isset($_SESSION['logado'])))
{
$_SESSION["msg"]="Preencha campos email e senha";
header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

?>

<form action="cadastro_usuario.php" method="POST" enctype="multipart/form-data">
Nome : <input type="text" name="nome">
Email : <input type="text" name="email">
CPF: <input type="text" name="cpf">
Senha: <input type="password" name="senha">
Imagem Perfil: <input type="file" name="foto_pe">
<input type="reset" name="botao" value="Limpar">
<input type="submit" name="botao" value="Enviar">
</form>
<a href='listagem_usuario.php'>Meu perfil</a><br><br>
<a href='buscar_usuario.php'>Busca por usuarios</a>
<br>
<br>
<form action="cadastro_produto.php" method="POST" enctype="multipart/form-data">
Nome do produto : <input type="text" name="nomeprod">
Descrição : <input type="text" name="descprod">
Imagem Perfil: <input type="file" name="foto_prod">
<input type="reset" name="botao" value="Limpar">
<input type="submit" name="botao" value="Enviar">
</form>
<a href='listagem_produtos.php'>Edição de prdutos</a>
<br>
<br>
<a href='sair.php'>Sair</a>