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
		 
			$select = $conn->prepare("SELECT * FROM funcionario where codigo=$cod");
			$select->execute();
		
			$row = $select->fetch();
			
	 ?>
		<form action="confirmaAlterarFunc.php" method="POST">

			<div class="container">
				<div class="row">
    				<div class="col">
      			
    				</div>
    				<div class="col">
      					<div class="mb-3">
      						<h1 class="bg-primary text-white">Alterar Funcionario</h1>
				
							<label for="cname"><b>Código</b></label>
							<input type="text" class="form-control" name="codigo" value="<?php echo $row['codigo'];?>" readonly="true">
							
							<label for="cname"><b>Nome</b></label>
							<input type="text" class="form-control" name="nome" value="<?php echo $row['nome'];?>" required>
							
							<label for="cCPF"><b>CPF</b></label>
							<input type="text" placeholder="CPF do Cliente" class="form-control" name="cpf" required maxlength="11" value="<?php echo $row['cpf'];?>"
							onkeypress='return event.charCode >= 48 && event.charCode <= 57'  
							onblur="alert(TestaCPF(this.value));">
							
							<label for="cRG"><b>RG</b></label>
							<input type="text" placeholder="RG do Cliente" class="form-control" name="rg" value="<?php echo $row['rg'];?>" required>
							
							<label for="cCEP"><b>CEP</b></label>
							<input type="text" placeholder="CEP do Cliente" id="cep" class="form-control" name="cep" value="<?php echo $row['cep'];?>"
								   onkeypress='return event.charCode >= 48 && event.charCode <= 57' required>
							<input type="button" name="buscaCep" value="Buscar" onclick="pesquisacep(cep.value);">
							<br><br>
							
							<label for="cRua"><b>Rua</b></label>
							<input type="text" class="form-control" name="rua" id="rua">
							
							<label for="cNumero"><b>Numero</b></label>
							<input type="text" class="form-control" name="numero" id="numero" value="<?php echo $row['numero'];?>" >
							
							<label for="cBairro"><b>Bairro</b></label>
							<input type="text" class="form-control" name="bairro" id="bairro">
							
							<label for="cCidade"><b>Cidade</b></label>
							<input type="text" class="form-control" name="cidade" id="cidade">
							
							<label for="cUF"><b>Estado</b></label>
							<input type="text" class="form-control" name="uf" id="uf">
							
							<label for="cCel"><b>Celular</b></label>
							<input type="text" placeholder="Celular do Cliente" class="form-control" name="celular" value="<?php echo $row['celular'];?>"  required>
							
							<label for="cEmail"><b>Email</b></label>
							<input type="text" placeholder="e-mail do Cliente" class="form-control" name="email" value="<?php echo $row['email'];?>"  required>

							<label>Data de Admissão</label>
                			<input name="dateFunc" type="date" value="<?php echo $row['data_admissao'];?>">
							<br>
							<hr>
							<br>	
							<div class="text-center">
								<button type="submit" class="btn btn-primary">Atualizar</button>
								<button type="button" class="btn btn-success" onclick="javascript: location.href='consultaCliente.php'">Voltar</button>
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


					
		


