<?php
if (!empty($_POST)) {

    $cliente = array($_POST['nome'], $_POST['cpf'], $_POST['rg'], $_POST['cep'], $_POST['rua'],
    $_POST['num'], $_POST['bairro'], $_POST['cidade'], $_POST['estado'],
    $_POST['celular'], $_POST['email']);

    $conteudo = "Cliente: ";

    for ($i = 0; $i < count($cliente); $i++) {
        echo "<br>" . $cliente[$i];
        $conteudo .= $cliente[$i] . ", ";
    }

    $conteudo .= "\n";

    $caminho = "../cadastros/cliente.txt"; // caminho onde será criado o arquivo

    if (file_put_contents($caminho, $conteudo, FILE_APPEND)) {
        echo "<script> alert('Dados cadastrados com sucesso'); </script>";
    } else {
        echo "<script> alert('Erro ao cadastrar!'); </script>";
    }
}
?>
