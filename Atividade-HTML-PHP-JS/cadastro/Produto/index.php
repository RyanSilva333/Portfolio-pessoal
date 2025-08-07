<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Produtos</title>
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style-main.css">
    <script type="text/javascript" src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">   
          
          <a class="navbar-brand" href="../Menu/index.html"><span class="title-371">371</span>Entrega</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Cadastro
                    </a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="../Cliente/index.php">Cliente</a></li>
                      <li><a class="dropdown-item" href="../Funci/index.php">Funcionário</a></li>
                      <li><a class="dropdown-item" href="../Fornecedor/index.php">Fornecedor</a></li>
                      <li><a class="dropdown-item" href="./index.php">Produto</a></li>
                      <li><a class="dropdown-item" href="../Usuario/index.php">Usuário</a></li>
                    </ul>
                  </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Consulta
                </a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="../consulta/consulta_cliente.php">Cliente</a></li>
                  <li><a class="dropdown-item" href="../consulta/consulta_funcionario.php">Funcionário</a></li>
                  <li><a class="dropdown-item" href="../consulta/consulta_fornecedor.php">Fornecedor</a></li>
                  <li><a class="dropdown-item" href="../consulta/consulta_produto.php">Produto</a></li>
                  <li><a class="dropdown-item" href="../consulta/consulta_usuario.php">Usuário</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../../index.html">Sair</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      

  <div class="middle-cotent">
    <header>
      <div class="titulo-header">
          <h2 class="titulo-Empresa">
              Via<strong>Express</strong>
          </h2>
          <h4 class="desc-empresa">
            Cadastro de <strong>Produtos</strong>
          </h4>
      </div>
  </header>
    <div class="conteudo-meio">
        <div class="conteudo-lista">
            <form action="#" method="POST">
                <label>Código do Produto</label>
                <input name="codProd" type="text" placeholder="Nome" id="Nome">
                
                <label>Nome do Produto</label>
                <input name="nomeProd" type="text" placeholder="Nome do Produto" id="Nome-Produto">

                <label>Catagoria</label>
                <input name="categoria" type="number" placeholder="catagoria" id="catagoria">

                <label>Descrição</label>
                <input name="desc" type="text" id="Descricao">

                
                <label>Preço de Compra</label>
                <input name="precoProd" type="number" id="prego-compra">

                <label>Quantidade</label>
                <input name="quantidadeProd" type="number">

                
                <label>Data de compra</label>
                <input name="dataCompra" type="date" id="#">

                
                <label>Validade</label>
                <input name="dataValidade" type="date" id="#">

                
                <label>Fornecedor</label>
                <input name="fornec" type="text" id="fornecedor">
                
                <hr>

                <div class="buttons">
                    <button class="enviar">Enviar</button>
                    <br>
                </div>
                
                

            </form>
            <div class="buttons1">
                <button class="apagar" onclick="limpa_formulário_cep()">Apagar</button>
            </div>
        
        </div>
    </div>
  </div>
    


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>



<?php
if(!empty($_POST)){
  $codProd = $_POST['codProd'];
	$nameProd = $_POST['nomeProd'];  
	$categoria = $_POST['categoria'];
	$descProd = $_POST['desc'];
	$precoProd = $_POST['precoProd'];
	$quantidade = $_POST['quantidadeProd'];
  $data_compra = $_POST['dataCompra'];
  //$data_validade = $_POST['dataValidade'];
  //$fornec = $_POST['fornec'];

	include_once('conexao.php');

  try{
    $stmt = $conn->prepare("INSERT INTO produtos (codProduto,NomeProduto,catagoria,descricao,preco,quantidade,dataCompra) VALUES (:codProduto,:NomeProduto,:catagoria,:descricao,:preco,:quantidade,:dataCompra)");

	  $stmt->bindParam(':codProduto', $codProd);
	  $stmt->bindParam(':NomeProduto', $nameProd);
	  $stmt->bindParam(':catagoria', $categoria);
	  $stmt->bindParam(':descricao', $descProd);
	  $stmt->bindParam(':preco', $precoProd);
	  $stmt->bindParam(':quantidade', $quantidade);
	  $stmt->bindParam(':dataCompra', $data_compra);

	  
	  $stmt->execute();

    echo "<script>alert('Cadastrado com Sucesso');</script>";

  } catch(PDOException $e) {
	  echo "Erro ao cadastrar: " . $e->getMessage();
  }
	$conn = null;
}
?>