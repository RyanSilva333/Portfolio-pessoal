<?php 

session_start(); 

if($_SESSION['login'] == "")
{
  echo"<script>
          alert('Você precisa logar no sistema');
       </script>";
  header( "refresh:0;url=index.php" );
} 
else
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body >
  
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
                  <li><a class="dropdown-item" href="../consulta/consulta_usuário.php">Usuário</a></li>
            </ul>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./sair.php">Logout</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="..\chat\home.php">CHAT</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="title-main">
      <h2>olá</h2>
      <span class="navbar-text text-danger">
        <?php echo $_SESSION['login'];?>
      </span></b>
    </div>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#MondalSearch">Encontrar Jogadores</button>

    

    <div class="alert alert-info mt-3" id="resultadoEscolha">
      <?php include 'mostrar_escolha.php'; ?>
    </div>
  </main>



  

  <div class="modal fade" id="MondalSearch" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Procurar Jogadores</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <h2>Olá, <span id="userProfile"></span></h2>
          <form action="#" id="selectgame" method="POST">
            <label>Game:</label>
                <select class="form-select" aria-label="Default select example" name="gameADD" id="GameADD">
                  <option selected>.....</option>
                  <option value="CS2">CS2</option>
                  <option value="GTA">GTA</option>
                  <option value="VALORANT">VALORANT</option>
                </select>

                <label>Estilo de Jogo:</label>
                <select class="form-select" aria-label="Default select example"  name="estiloADD" id="estiloADD">
                  <option selected>.....</option>
                  <option value="Casual">Casual</option>
                  <option value="Competitiva">Competitiva</option>
                  <option value="RPG">RPG</option>
                </select>
            <button class="btn btn-primary">Procurar</button>
              
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
         
          
        </div>
      </div>
      <div id="alertBox"></div>
    </div>
    
  </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>


<script>
  document.getElementById("procurarBtn").addEventListener("click", function() {
    const game = document.getElementById("GameADD").value;
    const estilo = document.getElementById("estiloADD").value;

    // Validação básica
    if (game === "....." || estilo === ".....") {
        alert("Escolha um jogo e estilo antes de enviar.");
        return;
    }

    fetch(".php", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded"
        },
        body: `game=${encodeURIComponent(game)}&estilo=${encodeURIComponent(estilo)}`
    })
    .then(response => response.text())
    .then(data => {
        // Mensagem de sucesso
        alert("Escolha salva!");

        // Atualiza dinamicamente o conteúdo da escolha
        fetch("mostrar_escolha.php")
            .then(response => response.text())
            .then(html => {
                document.getElementById("resultadoEscolha").innerHTML = html;
            });
    })
    .catch(error => {
        console.error("Erro ao salvar:", error);
    });
});
</script>


</body>
</html>

<?php

} //aqui eu fecho o else

if(!empty($_POST)){
  $game = $_POST['gameADD'];
	$estilo = $_POST['estiloADD'];
  $nomeUsuario = $_SESSION['login'];

	include_once('conexao.php');

  try{
    $stmt = $conn->prepare("INSERT INTO gameArea (game, estilo, nomeUsuario) VALUES (:game, :estilo, :usuario)");
    $stmt->bindParam(':game', $game);
    $stmt->bindParam(':estilo', $estilo);
    $stmt->bindParam(':usuario', $nomeUsuario);
    $stmt->execute();

    echo "<script>alert('Cadastrado com Sucesso');</script> ";
    echo "<script>location.href='index.php';</script>";
    
  } catch(PDOException $e) {
    echo "<script>alert('Cadastrado com Sucesso');</script>" . $e->getMessage();
  }
  $conn = null;
}


?>