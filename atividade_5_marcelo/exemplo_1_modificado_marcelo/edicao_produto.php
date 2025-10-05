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
    $codproduto= $_POST['codproduto'];
    $nome= $_POST['nomeprod'];
    $descricao=$_POST['descprod'];
  

   $res = mysqli_query($conexao, "SELECT foto_prod FROM produto WHERE codproduto = '$codproduto'");
   $dados = mysqli_fetch_assoc($res);
   $foto_prod = $dados['foto_prod'];
   

   if (isset($_FILES['foto_prod']) && $_FILES['foto_prod']['error'] == 0) {
      $foto_prod = $_FILES['foto_prod']['name'];
      $foto_temp = $_FILES['foto_prod']['tmp_name'];

      move_uploaded_file($foto_temp, "imagem/$foto_prod");
   }


    $SQL= "update produto set nomeprod='$nome', descprod='$descricao', foto_prod= '$foto_prod' where codproduto = '$codproduto'";
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

    $codproduto= $_POST['codproduto'];

    $SQL= "delete from produto where codproduto = '$codproduto'";
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
<br><a href='listagem_produtos.php'>Voltar </a>