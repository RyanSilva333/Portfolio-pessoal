<?php

include_once('conexao.php');

$cod = $_POST['codigo']; 
$nome = $_POST['nomeUsuario'];
$senhaUser = $_POST['senhaUsuario'];
$func = $_POST['funcionario'];

try {
	$stmt = $conn->prepare("UPDATE usuario SET nomeUsuario = :nome, senhaUsuario = :senhaUser, funcionario = :funcionario 
											   WHERE codigo = :id");

	$stmt->execute(array(
		':id' => $cod, 
		':nome' => $nome,
		':senhaUser' => $senhaUser,
		':funcionario' => $func
	));
	
	header("refresh:0;url=consulta_usuario.php");
	echo "<script>alert('Usuário ALTERADO COM SUCESSO');</script>";

} catch(PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}
?>
