<?php

include_once('conexao.php');

$cod = $_POST['codigo']; 
$nome = $_POST['nome'];
$cnpj = $_POST['cnpj'];
$IE = $_POST['ieFornecedor'];
$cep = $_POST['cep'];
$num = $_POST['numero'];
$email = $_POST['email'];
$cel = $_POST['celular'];

	try{
		
		$stmt = $conn->prepare("UPDATE fornecedor SET nome = :nome, cnpj = :cnpj, IE = :ie, cep = :cep,
												   numero = :num, email = :email, celular = :cel 
											   WHERE codigo = :id");

		$stmt->execute(array(':id' => $cod, 
							 ':nome' => $nome,
							 ':cnpj' => $cnpj,
							 ':ie' => $IE,
							 ':cep' => $cep,
							 ':num' => $num,
                             ':email' => $email,
                             ':cel' => $cel));
		
		header( "refresh:0;url=consulta_fornecedor.php" );

		echo "<script>alert('FORNECEDOR ALTERADO COM SUCESSO');</script>";
	
	}catch(PDOException $e){
		echo 'Error: ' . $e->getMessage();
	}
 ?>

