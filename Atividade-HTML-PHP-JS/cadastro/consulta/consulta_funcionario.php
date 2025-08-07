<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style-nav.css">
    <link rel="stylesheet" href="style-main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
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
                     <li><a class="dropdown-item" href="./consulta_cliente.php">Cliente</a></li>
                      <li><a class="dropdown-item" href="./consulta_funcionario.php">Funcionário</a></li>
                      <li><a class="dropdown-item" href="./consulta_fornecedor.php">Fornecedor</a></li>
                      <li><a class="dropdown-item" href="./consulta_produto.php">Produto</a></li>
                      <li><a class="dropdown-item" href="./consulta_usuario.php">Usuário</a></li>
                </ul>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="../../index.html">Sair</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <h2>Lista de Funcionario</h2>
    

<?php

    include_once('conexao.php');
    try{
        $select = $conn->prepare('SELECT * FROM funcionario');
        $select->execute();

        while($row = $select->fetch())
        {
            echo "<br>";
            echo "<p>";
            echo "<br><b> Codigo: </b>".$row['codigo'];
            echo "<br><b> Nome: </b>".$row['nome'];
            echo "<br><b>CPF: </b>".$row['cpf'];
            echo "<br><b>RG: </b>".$row['rg'];
            echo "<br><b>CEP: </b>".$row['cep'];
            echo "<br><b>Número: </b>".$row['numero'];
            echo "<br><b>Email: </b>".$row['email'];
            echo "<br><b>Data: </b>".$row['data_admissao'];
            echo "<br>";


     

?>

<button class='btn btn-primary' onclick="window.location.href='alterarFunc.php?id=<?php echo $row['codigo']; ?>'">
    Alterar
</button>

<button class='btn btn-danger' onclick="window.location.href='excluirFunc.php?id=<?php echo $row['codigo']; ?>'">
    Excluir
</button>

<button class='btn btn-warning' onclick="window.location.href='menu.php'">
    Voltar
</button>
<hr>

<?php
   }
} catch(PDOException $e)
{
    echo 'ERROR: ' . $e->getMessage();
}







?>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>
</html>