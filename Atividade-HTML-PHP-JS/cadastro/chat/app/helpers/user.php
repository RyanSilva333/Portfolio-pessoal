<?php  

function getUser($username, $conn) {
    $sql = "SELECT * FROM usuario WHERE nomeUsuario = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$username]);

    if ($stmt->rowCount() === 1) {
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } else {
        return [];
    }
}
