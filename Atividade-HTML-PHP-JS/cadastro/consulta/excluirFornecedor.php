<link rel="stylesheet" href="css/styless.css">

<?php

	echo"<h1>Excluir Cliente</h1>";

	$cod = $_GET['id'];
	
	include_once('conexao.php');
	 
		$select = $conn->prepare("SELECT * FROM fornecedor where codigo=$cod");
		$select->execute();
	
		while($row = $select->fetch()) 
		{
			echo "<p>";
			echo "<br><b>Codigo: </b>".$row['codigo'];
			echo "<br><b>Nome: </b>".$row['nome'];
			echo "<br><b>CNPJ: </b>".$row['cnpj'];
			echo "<br><b>I.E: </b>".$row['ie'];
			echo "<br><b>CEP: </b>".$row['cep'];
			echo "<br><b>Numero: </b>".$row['numero'];
			echo "<br><b>Celular: </b>".$row['celular'];
			echo "<br><b>Email: </b>".$row['email'];
			echo "</p>";
?>
	
	<button onclick="window.location.href='confirmaExcluirFornecedor.php?id=<?php echo $row['codigo'];?>'">
		Excluir
	</button>
	
	<button onclick="window.location.href='consulta_fornecedor.php'">Voltar</button>

<?php
		}
?>
