<?php
session_start();

if((!isset($_SESSION['email'])) && (!isset($_SESSION['logado'])))
{
$_SESSION["msg"]="Preencha campos email e senha";
header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

include "conecta.php";
if($_POST['acao']=='editar')
{ 
    $codpessoa= $_POST['codpessoa'];
    $nome= $_POST['nome'];
    $email=$_POST['email'];
    $cpf=$_POST['cpf'];
    $senha=$_POST['senha'];
 
   $res = mysqli_query($conexao, "SELECT foto_pe FROM pessoa WHERE codpessoa = '$codpessoa'");
   $dados = mysqli_fetch_assoc($res);
   $foto_pe = $dados['foto_pe'];
   

   if (isset($_FILES['foto_pe']) && $_FILES['foto_pe']['error'] == 0) {
      $foto_pe = $_FILES['foto_pe']['name'];
      $foto_temp = $_FILES['foto_pe']['tmp_name'];

      move_uploaded_file($foto_temp, "imagem/$foto_pe");
   }

    $SQL= "update pessoa set nome='$nome', email='$email', cpf='$cpf', senha='$senha', foto_pe='$foto_pe'  where codpessoa = '$codpessoa'";
    //echo $SQL;
 
    $resultado=mysqli_query($conexao,$SQL);

    if($resultado)
    {
       echo "Alteração Efetuada com sucesso";
    }
    else
    {
       echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
       echo 'Mensagem de erro:'.mysqli_error( $conexao).'<br>';
    }

}
else
{
  if($_POST['acao']=='excluir')
  {

    $codpessoa= $_POST['codpessoa'];

    $SQL= "delete from pessoa where codpessoa = '$codpessoa'";
    //echo $SQL;

    $resultado=mysqli_query($conexao,$SQL);

    if($resultado)
    {
       echo "Exclusão Efetuada com sucesso";
    }
    else
    {
       echo 'Código de erro:'.mysqli_errno( $conexao ).'<br>';
       echo 'Mensagem de erro:'.mysqli_error( $conexao).'<br>';
    }

}
}
?>
<br><a href='listagem_usuario.php'>Voltar </a>