<html>
	<head>
		<meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
	    <script src="js/buscaCep.js"> </script>
		<script src="js/validaCPF.js"> </script>
		<title>SISTEMA COMERCIAL - ALTERAR CLIENTE</title>
		</script>
	</head>
	<body>

	<?php

		$cod = $_GET['id'];
		
		include_once('conexao.php');
		 
			$select = $conn->prepare("SELECT * FROM Produtos where codigo=$cod");
			$select->execute();
		
			$row = $select->fetch();
			
	 ?>
		<form action="confirmaAlterarProduto.php" method="POST">

			<div class="container">
				<div class="row">
    				<div class="col">
      			
    				</div>
    				<div class="col">
      					<div class="mb-3">
      						<h1 class="bg-primary text-white">Alterar Produtp</h1>
				
							<label for="cname"><b>Código</b></label>
							<input type="text" class="form-control" name="codigo" value="<?php echo $row['codigo'];?>" readonly="true">
							
							<label for="cname"><b>Codigo do Produto:</b></label>
							<input type="text" class="form-control" name="codProd" value="<?php echo $row['codProduto'];?>" required>
							
							<label for="cCPF"><b>Nome do Produto</b></label>
							<input type="text" placeholder="CPF do Cliente" class="form-control" name="nomeProd" required value="<?php echo $row['NomeProduto'];?>">
							
							<label for="cRG"><b>Categoria</b></label>
							<input type="number" placeholder="RG do Cliente" class="form-control" name="categoria" value="<?php echo $row['catagoria'];?>" required>

							<label for="cRG"><b>Descrição</b></label>
							<input type="text" placeholder="RG do Cliente" class="form-control" name="desc" value="<?php echo $row['descricao'];?>" required>
							
							<label for="cRG"><b>Preço</b></label>
							<input type="number" placeholder="RG do Cliente" class="form-control" name="precoProd" value="<?php echo $row['preco'];?>" required>
							
							<label for="cRG"><b>Quantidade</b></label>
							<input type="number" placeholder="RG do Cliente" class="form-control" name="quantidade" value="<?php echo $row['quantidade'];?>" required>
												
							<br>
							<label>Data da Compra</label>
                			<input name="dateFunc" type="date" value="<?php echo $row['dataCompra'];?>">
							<br>
							<hr>
							<br>	
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Atualizar</button>
								<button type="button" class="btn btn-success" onclick="javascript: location.href='consultaProduto.php'">Voltar</button>
							</div>
						</div>
  					</div>
  					<div class="col">
      			
    				</div>
				</div>
			</div>
		</form>
	</body>
</html>


					
		


