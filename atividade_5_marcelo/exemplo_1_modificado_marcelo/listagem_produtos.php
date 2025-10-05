<?php
session_start();

if((!isset($_SESSION['email'])) && (!isset($_SESSION['logado'])))
{
$_SESSION["msg"]="Preencha campos email e senha";
header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

include "conecta.php";

$sql = "select * from produto order by codproduto";


$resultado = mysqli_query($conexao,$sql);

while($linha=mysqli_fetch_assoc($resultado)) {

$imagem = "imagem/" . $linha['foto_prod'];
if (empty($linha['foto_prod']) || !file_exists($imagem)) {
    $imagem = "imagem/default.jpg"; // Caminho da imagem padrão
}


?>
<section>
<form action="edicao_produto.php" method="post" enctype="multipart/form-data">
<p><img src="<?php echo $imagem;?>" width='100px' height='100px'/></p>
<p>ID: <?php echo $linha['codproduto']; ?></p>
<input type ="hidden" name = "codproduto" value="<?php echo $linha['codproduto']?>">
<p>Nome do produto:  <input type="text" name="nomeprod" value="<?php echo $linha['nomeprod']?>"></p>
<p>Descrição:<input type ="text" name = "descprod" value="<?php echo $linha['descprod']?>"></p> 
<p>Imagem Produto: <input type="file" name="foto_prod" value="<?php echo $linha['foto_prod']?>"><p>

<button type="submit" name="acao" value="editar"> Editar </button>
<button type="submit" name="acao" value="excluir"> Deletar </button> 
</form>                                                         
</section>
<?php
}
?>
<a href='index.php'>Voltar </a>