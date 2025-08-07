<?php

include_once('conexao.php');

$cod = $_POST['codigo']; 
$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$rg = $_POST['rg'];
$cep = $_POST['cep'];
$num = $_POST['numero'];
$email = $_POST['email'];
$cel = $_POST['celular'];

	try{
		
		$stmt = $conn->prepare("UPDATE cliente SET nome = :nome, cpf = :cpf, rg = :rg, cep = :cep,
												   numero = :num, email = :email, celular = :cel 
											   WHERE codigo = :id");

		$stmt->execute(array(':id' => $cod, 
							 ':nome' => $nome,
							 ':cpf' => $cpf,
							 ':rg' => $rg,
							 ':cep' => $cep,
							 ':num' => $num,
                             ':email' => $email,
                             ':cel' => $cel));
		
		header( "refresh:0;url=consulta_cliente.php" );

		echo "<script>alert('CLIENTE ALTERADO COM SUCESSO');</script>";
	
	}catch(PDOException $e){
		echo 'Error: ' . $e->getMessage();
	}
 ?>

