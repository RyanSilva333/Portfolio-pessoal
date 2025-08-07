<?php  

session_start();

# check if the user is logged in
if (isset($_SESSION['login'])) {
	
	# database connection file
	include 'conexao.php';

	# get the logged in user's codigo from SESSION
	$id = $_SESSION['codigo'];

	$sql = "UPDATE usuario
	        SET last_seen = NOW() 
	        WHERE codigo = ?";
	$stmt = $conn->prepare($sql);
	$stmt->execute([$id]);

} else {
	header("Location: ../../index.php");
	exit;
}
