<?php
session_start();

if((!isset($_SESSION['email'])) && (!isset($_SESSION['logado'])))
{
$_SESSION["msg"]="Preencha campos email e senha";
header("Location:login.php"); // se as variáveis de sessão não estão setadas direciona para o formulário de login
}

$nome=$_POST['busca_nome'];
$cpf=$_POST['busca_cpf'];

if (empty($nome) && empty($cpf)) {
    echo "<p>Por favor, informe um nome ou CPF para buscar.</p>";
    echo "<a href='buscar_usuario.php'>Voltar</a>";
    exit;
}

include "conecta.php";

if (!empty($nome) && empty($cpf)) {
    $sql = "SELECT * FROM pessoa WHERE nome LIKE '%$nome%'";
} elseif (!empty($cpf) && empty($nome)) {
    $sql = "SELECT * FROM pessoa WHERE cpf = '$cpf'";
} elseif (!empty($nome) && !empty($cpf)) {
    $sql = "SELECT * FROM pessoa WHERE nome LIKE '%$nome%' AND cpf = '$cpf'";
}



$resultado = mysqli_query($conexao,$sql);

if (mysqli_num_rows($resultado) == 0) {
    echo "<p>Nenhum usuário encontrado com os critérios informados.</p>";
    echo "<a href='buscar_usuario.php'>Voltar</a>";
    exit;
}

$linha=mysqli_fetch_assoc($resultado);

$imagem = "imagem/" . $linha['foto_pe'];
if (empty($linha['foto_pe']) || !file_exists($imagem)) {
    $imagem = "imagem/default.jpg"; // Caminho da imagem padrão
}

?>
<p><img src="<?php echo $imagem; ?>" width='150px' height='150px'></p>
<p>ID: <?php echo $linha['codpessoa']; ?></p>
<p>Nome: <?php echo $linha['nome']?></p>
<p>Email:<?php echo $linha['email']?></p> 
<p>CPF: <?php echo $linha['cpf']?></p>

<a href='buscar_usuario.php'>Voltar </a>