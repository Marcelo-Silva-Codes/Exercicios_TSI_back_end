<?php
if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['cpf']) && isset($_POST['bandeira'])) {
    $nome = $_POST['nome'];
    $email =$_POST['email'];
    $cpf = $_POST['cpf'];
    $bandeira = $_POST['bandeira'];

    echo "<h2>Dados Recebidos</h2>";
    echo "Nome: <strong>$nome</strong><br>";
    echo "Email: <strong>$email</strong><br>";
    echo "CPF: <strong>$cpf</strong><br>";
    echo "Bandeira do Cartão: <strong>$bandeira</strong><br>";
} else {
    echo "Nenhum dado recebido.";
}
?>