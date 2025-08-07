<?php
include_once('conexao.php');

try {
    $stmt = $conn->query("SELECT * FROM gameArea ORDER BY codigo DESC LIMIT 1");
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        echo "<strong>Escolhido por:</strong> " . htmlspecialchars($row['nomeUsuario']) . "<br>";
        echo "<strong>Game escolhido:</strong> " . htmlspecialchars($row['game']) . "<br>";
        echo "<strong>Estilo:</strong> " . htmlspecialchars($row['estilo']);
        echo "<br><br><button onclick=\"window.location.href='../chat/chat.php?user={$row['nomeUsuario']}';\">Novo</button>";
    } else {
        echo "Nenhuma escolha ainda.";
    }
} catch(PDOException $e) {
    echo "Erro: " . $e->getMessage();
}
?>
