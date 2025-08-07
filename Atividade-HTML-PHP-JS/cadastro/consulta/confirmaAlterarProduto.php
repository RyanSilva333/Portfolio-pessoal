<?php

include_once('conexao.php');

$cod = $_POST['codigo']; 
$codProd = $_POST['codProd'];
$nomeProd = $_POST['nomeProd'];
$categoria = $_POST['categoria'];
$desc = $_POST['desc'];
$preco = $_POST['precoProd'];
$quantidade = $_POST['quantidade'];
$dataCompra = $_POST['dateFunc'];

try {
	$stmt = $conn->prepare("UPDATE Produtos SET codProduto = :codProd, NomeProduto = :nomeProd, catagoria = :categoria, 
		descricao = :descricao, preco = :preco, quantidade = :quantidade, dataCompra = :dataCompra 
		WHERE codigo = :codigo");

	$stmt->execute(array(
		':codigo' => $cod, 
		':codProd' => $codProd,
		':nomeProd' => $nomeProd,
		':categoria' => $categoria,
		':descricao' => $desc,
		':preco' => $preco,
		':quantidade' => $quantidade,
		':dataCompra' => $dataCompra
	));
	
	header("refresh:0;url=consulta_Produto.php");
	echo "<script>alert('PRODUTO ALTERADO COM SUCESSO');</script>";

} catch(PDOException $e) {
	echo 'Error: ' . $e->getMessage();
}
?>
