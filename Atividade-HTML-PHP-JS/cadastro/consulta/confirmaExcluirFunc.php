<?php

$cod = $_GET['id'];


include_once('conexao.php');
	try 
	{
		   
		$delete = $conn->prepare("DELETE FROM funcionario WHERE codigo=$cod");
		$delete->execute();
		echo "<h1>Funcionario excluido com sucesso</h1>";
	} 
	catch(PDOException $e) 
	{
		echo 'ERROR: ' . $e->getMessage();
	}
	
 ?>
<button onclick="window.location.href='consulta_funcionario.php'">Voltar</button>