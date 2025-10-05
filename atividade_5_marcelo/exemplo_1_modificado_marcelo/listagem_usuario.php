<?php
session_start();

if((!isset($_SESSION['email'])) && (!isset($_SESSION['logado'])))
{
$_SESSION["msg"]="Preencha campos email e senha";
header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}
include "conecta.php";
$codpessoa=$_SESSION['cod'];
$sql = "select * from pessoa where codpessoa= $codpessoa";


$resultado = mysqli_query($conexao,$sql);

$linha=mysqli_fetch_assoc($resultado);

$imagem = "imagem/" . $linha['foto_pe'];
if (empty($linha['foto_pe']) || !file_exists($imagem)) {
    $imagem = "imagem/default.jpg"; // Caminho da imagem padrão
}

?>
<section>

<form action="edicao_usuario.php" method="post" enctype="multipart/form-data">

<p><img src="<?php echo $imagem; ?>" width='150px' height='150px'></p>
<p>ID: <?php echo $linha['codpessoa']; ?></p>
<input type ="hidden" name = "codpessoa" value="<?php echo $linha['codpessoa']?>">
<p>Nome:  <input type="text" name="nome" value="<?php echo $linha['nome']?>"></p>
<p>Email:<input type ="text" name = "email" value="<?php echo $linha['email']?>"></p> 
<p>CPF: <input type ="text" name = "cpf" value="<?php echo $linha['cpf']?>"></p>
<p>Senha: <input type ="password" name = "senha" value="<?php echo $linha['senha']?>" ?></p>
<p>Imagem Perfil: <input type="file" name="foto_pe" value="<?php echo $linha['foto_pe']?>"><p>

<button type="submit" name="acao" value="editar"> Editar </button>
<button type="submit" name="acao" value="excluir"> Deletar </button> 
</form>                                                         
</section>

<a href='index.php'>Voltar </a>


