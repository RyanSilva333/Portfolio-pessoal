<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "sistema";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql_cliente = "DROP TABLE IF EXISTS cliente";
    $conn->exec($sql_cliente);

    $sql = "CREATE TABLE cliente (codigo INT PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(50) NOT NULL,
        cpf VARCHAR(20) NOT NULL,
        rg VARCHAR(20) NOT NULL,
        cep VARCHAR(20) NOT NULL,
        numero VARCHAR(10) NOT NULL,
        celular VARCHAR(20) NOT NULL,
        email VARCHAR(40) NOT NULL)";
    
    $conn->exec($sql);

    $sql_funcionario = "DROP TABLE IF EXISTS funcionario";
    $conn->exec($sql_funcionario);

    $sql_funcionario = "CREATE TABLE funcionario (codigo INT PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(50) NOT NULL,
        cpf VARCHAR(20) NOT NULL,
        rg VARCHAR(20) NOT NULL,
        cep VARCHAR(20) NOT NULL,
        numero VARCHAR(10) NOT NULL,
        celular VARCHAR(20) NOT NULL,
        email VARCHAR(40) NOT NULL,
        data_admissao DATE NOT NULL )";
    
    $conn->exec($sql_funcionario);




    $sql_fornecedor = "DROP TABLE IF EXISTS fornecedor";
    $conn->exec($sql_fornecedor);

    $sql_fornecedor = "CREATE TABLE fornecedor (codigo INT PRIMARY KEY AUTO_INCREMENT,
        nome VARCHAR(50) NOT NULL,
        cnpj VARCHAR(20) NOT NULL,
        ie VARCHAR(20) NOT NULL,
        cep VARCHAR(20) NOT NULL,
        numero VARCHAR(10) NOT NULL,
        celular VARCHAR(20) NOT NULL,
        email VARCHAR(40) NOT NULL,
        vendedor VARCHAR(50) NOT NULL )";

    $conn->exec($sql_fornecedor);

    
   
        
    $sql_produtos = "DROP TABLE IF EXISTS produtos";
    $conn->exec($sql_produtos);
    
    $sql_produtos = "CREATE TABLE produtos (codigo INT PRIMARY KEY AUTO_INCREMENT,
        codProduto VARCHAR(50) NOT NULL,
        NomeProduto VARCHAR(20) NOT NULL,
        catagoria VARCHAR(20) NOT NULL,
        descricao VARCHAR(80) NOT NULL,
        preco VARCHAR(10) NOT NULL,
        quantidade VARCHAR(20) NOT NULL,
        dataCompra DATE NOT NULL)";
    $conn->exec($sql_produtos);


    $sql_gameArea = "DROP TABLE IF EXISTS gameArea";
    $conn->exec($sql_gameArea);
    
    $sql_gameArea = "CREATE TABLE gameArea (codigo INT PRIMARY KEY AUTO_INCREMENT,
        game VARCHAR(50) NOT NULL,
        estilo VARCHAR(20) NOT NULL,
        nomeUsuario VARCHAR(20) NOT NULL)";
    $conn->exec($sql_gameArea);




    $sql_usuario = "DROP TABLE IF EXISTS usuario";
    $conn->exec($sql_usuario);

    
    $sql_usuario = "CREATE TABLE usuario (codigo INT PRIMARY KEY AUTO_INCREMENT,
        nomeUsuario VARCHAR(20) NOT NULL,
        senhaUsuario VARCHAR(20) NOT NULL,
        funcionario VARCHAR(20) NOT NULL)";
    $conn->exec($sql_usuario);


    
    // Tabela: conversations
      $sql_conversations = "DROP TABLE IF EXISTS conversations";
      $conn->exec($sql_conversations);
  
      $sql_conversations = "CREATE TABLE conversations (
          conversation_id INT PRIMARY KEY AUTO_INCREMENT,
          user_1 INT NOT NULL,
          user_2 INT NOT NULL
      )";
      $conn->exec($sql_conversations);
  
      // Tabela: chats
      $sql_chats = "DROP TABLE IF EXISTS chats";
      $conn->exec($sql_chats);
  
      $sql_chats = "CREATE TABLE chats (
          chat_id INT PRIMARY KEY AUTO_INCREMENT,
          from_id INT NOT NULL,
          to_id INT NOT NULL,
          message TEXT NOT NULL,
          opened TINYINT(1) NOT NULL DEFAULT 0,
          created_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
      )";
      $conn->exec($sql_chats);


    echo "Tb criado";


} catch(PDOExecption $e) {
    echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>