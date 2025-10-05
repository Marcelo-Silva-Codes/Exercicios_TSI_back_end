<?php
session_start();

if((!isset($_SESSION['email'])) && (!isset($_SESSION['logado'])))
{
$_SESSION["msg"]="Preencha campos email e senha";
header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

$nome=$_POST['nome'];
$email=$_POST['email'];
$cpf=$_POST['cpf'];
$senha=$_POST['senha'];
$nome_foto = $_FILES['foto_pe']['name'];
$tamanho_foto = $_FILES['foto_pe']['size'];
$foto_temp = $_FILES['foto_pe']['tmp_name'];

if(move_uploaded_file($foto_temp, "imagem/$nome_foto" )){
   echo "Upload da foto:". $nome_foto. "foi concluído com sucesso <br>";
}

else{
   echo"Foto não pode ser copiado para o servidor";
   
}


include "conecta.php";

$sql="insert into pessoa (nome,email,cpf,senha,foto_pe) values ('$nome','$email','$cpf','$senha','$nome_foto')";


//echo $sql;

$resultado = mysqli_query($conexao,$sql);

if($resultado)
{
   echo "Cadastro Efetuado com sucesso";
}
else
{
   echo 'Código de erro:'.mysqli_error( $conexao ).'<br>';
   echo 'Mensagem de erro:'.mysqli_error( $conexao).'<br>';
}

?>
<br><a href='index.php'>Voltar </a>