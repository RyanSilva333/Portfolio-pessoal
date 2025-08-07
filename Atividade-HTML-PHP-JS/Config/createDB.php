<?php
$servername = "localhost:3306";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE DATABASE sistema";

    $conn->exec($sql);

    echo "BC criado";
} catch(PDOExecption $e) {
    echo $sql ."<br>" . $e->getMessage();
}

$conn = null;

?>