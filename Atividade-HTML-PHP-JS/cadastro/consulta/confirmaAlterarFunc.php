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
$date_admissao = $_POST['dateFunc'];

	try{
		
		$stmt = $conn->prepare("UPDATE funcionario SET nome = :nome, cpf = :cpf, rg = :rg, cep = :cep,
												   numero = :num, email = :email, data_admissao = :data_admissao, celular = :cel 
											   WHERE codigo = :id");

		$stmt->execute(array(':id' => $cod, 
							 ':nome' => $nome,
							 ':cpf' => $cpf,
							 ':rg' => $rg,
							 ':cep' => $cep,
							 ':num' => $num,
                             ':email' => $email,
							 ':data_admissao' => $date_admissao,
                             ':cel' => $cel));
		
		header( "refresh:0;url=consulta_funcionario.php" );

		echo "<script>alert('FUNCIONARIO ALTERADO COM SUCESSO');</script>";
	
	}catch(PDOException $e){
		echo 'Error: ' . $e->getMessage();
	}
 ?>

