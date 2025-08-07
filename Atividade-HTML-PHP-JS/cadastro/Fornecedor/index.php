<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Fornecedor</title>
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
                      <li><a class="dropdown-item" href="../Produto/index.php">Produto</a></li>
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
            Cadastro de <strong>Fornecedor</strong>
          </h4>
      </div>
  </header>
    <div class="conteudo-meio">
        <div class="conteudo-lista">
            <form action="#" method="post">
                <label>Nome</label>
                <input type="text" placeholder="Nome" name="nomeFornecedor" id="nomeFornecedor" oninput="atualizeRG(this)">
                
                <label>CNPJ</label>
                <input type="number" placeholder="CNPJ" name="cnpjFornecedor" id="cnpjFornecedor" maxlength="18">

                <label>I.E</label>
                <input type="number" placeholder="IE" name="ieFornecedor" id="ieFornecedor">



                <div class="consulta-CEP">
                    <label class="label-CEP">CEP</label><br>
                    <input name="cepFornecedor" type="text" id="cep" size="10" maxlength="9" onblur="pesquisacep(this.value);" placeholder="CEP"/>
                    <br>
                    <label class="label-CEP">Rua</label><br>
                    <input name="rua" type="text" id="rua" size="60" />

                    <label class="label-CEP">Nº</label><br>
                    <input name="numFornecedor" type="number" id="#" />

                    <label class="label-CEP">Bairro</label>
                    <input name="bairro" type="text" id="bairro" size="40" />

                    <label class="label-CEP">Cidade</label>
                    <input name="cidade" type="text" id="cidade" size="40" />

                    <label class="label-CEP">Estado</label>
                    <input name="uf" type="text" id="uf" size="2" />

                    

                </div>
                
                

                <label>Celular</label>
                <input type="text" placeholder="Celular" name="celFornecedor"  id='celFornecedor'>

                <label>Email</label>
                <input type="text" name="gmailFornecedor" placeholder="Email" id='gmailFornecedor'>

                <label>Vendedor</label>
                <input type="text" placeholder="Vendedor">
                <hr>

                <div class="buttons">
                    <button type="submit" class="enviar">Enviar</button>
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
  $nome = $_POST['nomeFornecedor'];
	$cnpj = $_POST['cnpjFornecedor'];  
	$IE = $_POST['ieFornecedor'];
  $cep = $_POST['cepFornecedor'];
  $numero = $_POST['numFornecedor'];
	$celular = $_POST['celFornecedor'];
	$email = $_POST['gmailFornecedor'];

	include_once('conexao.php');

  try{
    $stmt = $conn->prepare("INSERT INTO fornecedor (nome,cnpj,ie,cep,numero,celular,email) VALUES (:nome,:cnpj,:IE,:cep,:numero,:celular,:email)");

	  $stmt->bindParam(':nome', $nome);
	  $stmt->bindParam(':cnpj', $cnpj);
	  $stmt->bindParam(':IE', $IE);
    $stmt->bindParam(':cep', $cep);
    $stmt->bindParam(':numero', $numero);
	  $stmt->bindParam(':celular', $celular);
	  $stmt->bindParam(':email', $email);
	  
	  $stmt->execute();

    echo "<script>alert('Cadastrado com Sucesso');</script>";

  } catch(PDOException $e) {
	  echo "Erro ao cadastrar: " . $e->getMessage();
  }
	$conn = null;
}
?>