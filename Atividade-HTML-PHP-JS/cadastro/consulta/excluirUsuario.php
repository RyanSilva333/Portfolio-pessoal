<link rel="stylesheet" href="css/styless.css">

<?php

	echo"<h1>Excluir Produto?</h1>";

	$cod = $_GET['id'];
	
	include_once('conexao.php');
	 
		$select = $conn->prepare("SELECT * FROM usuario where codigo=$cod");
		$select->execute();
	
		while($row = $select->fetch()) 
		{
			echo "<br>";
            echo "<p>";
            echo "<br><b> Codigo: </b>".$row['codigo'];
            echo "<br><b> Nome de Usuario: </b>".$row['nomeUsuario'];
            echo "<br><b>Senha: </b>".$row['senhaUsuario'];
            echo "<br><b>Funcionario: </b>".$row['funcionario'];
			echo "<br>";
            echo "<br>";
?>
	
	<button onclick="window.location.href='confirmaExcluirUsuario.php?id=<?php echo $row['codigo'];?>'">
		Excluir
	</button>
	
	<button onclick="window.location.href='consulta_usuario.php'">Voltar</button>

<?php
		}
?>
