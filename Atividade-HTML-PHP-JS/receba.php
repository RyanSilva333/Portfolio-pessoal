<?php
// Credenciais fixas
$email_Login = "admin@admin";
$senha_Login = "1234";

// Obtém os dados enviados via POST
$email = $_POST['email'] ?? '';
$senha = $_POST['password1'] ?? '';

// Verifica se os dados são válidos
if ($email === $email_Login && $senha === $senha_Login) {
    //Mensagem De Sucesso ao Realizarlogi
    echo "<script>alert('Login realizado com sucesso!');</script>";
    //ir para pagina desejada
    header("Location: cadastro/Menu");
} else {
    echo "<script>alert('Email ou senha inválidos!');</script>";
    echo "<h2>Erro: Credenciais inválidas.</h2>";
}
?>
