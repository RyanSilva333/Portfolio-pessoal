<link rel="stylesheet" href="css/styless.css">

<?php

	echo"<h1>Excluir Produto?</h1>";

	$cod = $_GET['id'];
	
	include_once('conexao.php');
	 
		$select = $conn->prepare("SELECT * FROM produtos where codigo=$cod");
		$select->execute();
	
		while($row = $select->fetch()) 
		{
			echo "<br>";
            echo "<p>";
            echo "<br><b> Codigo: </b>".$row['codigo'];
            echo "<br><b> Codigo Produto: </b>".$row['codProduto'];
            echo "<br><b>Nome do Produto: </b>".$row['NomeProduto'];
            echo "<br><b>Categoria: </b>".$row['catagoria'];
            echo "<br><b>Descrição: </b>".$row['descricao'];
            echo "<br><b>Preço: </b>".$row['preco'];
            echo "<br><b>Quantidade: </b>".$row['quantidade'];
            echo "<br><b>Data da Compra: </b>".$row['dataCompra'];
            echo "<br>";
?>
	
	<button onclick="window.location.href='confirmaExcluirProd.php?id=<?php echo $row['codigo'];?>'">
		Excluir
	</button>
	
	<button onclick="window.location.href='consulta_produto.php'">Voltar</button>

<?php
		}
?>
