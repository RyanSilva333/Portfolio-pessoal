<?php

$cod = $_GET['id'];


include_once('conexao.php');
	try 
	{
		   
		$delete = $conn->prepare("DELETE FROM fornecedor WHERE codigo=$cod");
		$delete->execute();
		echo "<h1>Fornecedor excluido com sucesso</h1>";
	} 
	catch(PDOException $e) 
	{
		echo 'ERROR: ' . $e->getMessage();
	}
	
 ?>
<button onclick="window.location.href='consulta_fornecedor.php'">Voltar</button>